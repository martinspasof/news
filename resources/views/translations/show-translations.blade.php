@extends('layouts.app')

@section('template_title')
{{trans('backend.Showing Translations')}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div v-cloak class="panel panel-default" id="app">
                <div class="status-panel">
                    <div class="progress">
                        <div class="indeterminate" v-if="spinner"></div>
                    </div>                 
                    <div class="custom-alert">   
                        <transition name="fade">
                            <div v-if="msg"  class="custom-alert-inner alert alert-success">@{{msg}}</div>
                        </transition>
                    </div>
                </div>
                <div class="panel-heading">
                    <div  class="col-sm-12" style="display: flex; justify-content: space-between; align-items: center;">
                        {{trans('backend.Showing All Translations')}}
                        <span v-cloak v-if="msg" class="text-danger">@{{msg}}</span>
                        <div class="btn-group pull-right btn-group-xs">
                            <select v-on:change="buildQuery('lang_group', filterGroup)" v-model="filterGroup" name="group-filter" id="group-filter" class="form-control">
                                <option v-bind:value="def">{{trans('backend.Filter By Group')}}</option>
                                <option v-for="group in groupsList" v-bind:value="group">@{{group}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <input type="text" v-model="filterSearch" name="search-filter" class="form-control" placeholder="{{trans('backend.Search By Text or Key')}}">
                    </div>
                    <br>&nbsp;<small v-cloak v-if="!spinner">{{trans('backend.Showing')}} <b>@{{pagination.from}}</b>-<b>@{{pagination.to}}</b> {{trans('backend.From')}} <b>@{{pagination.total}}</b> {{trans('backend.Results')}}</small>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed table-responsive">
                            <thead>
                                <tr>
                                    <th  >{{trans('backend.Translations')}}</th>
                                    <th class="sortable" v-on:click="buildQuery('order_by', 'lang_key')" v-bind:class="orderType.lang_key == 'asc' ? 'sort_asc' : ''">{{trans('backend.Key')}} <i class="fa fa-fw fa-sort"></i></th>
                                    <th  class="sortable" v-on:click="buildQuery('order_by', 'lang_group')" v-bind:class="orderType.lang_group == 'asc' ? 'sort_asc' : ''">{{trans('backend.Group')}} <i class="fa fa-fw fa-sort"></i></th>
                                    @level(5)
                                        <th style="text-align: right;">{{trans('backend.Actions')}} </th>
                                     @endlevel
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="list in translationsList" v-if="deleted.indexOf(list.id) < 0">
                                    <td class="col-md-6 col-xs-6 form-horizontal">
                                        <div  v-for="lang in langsList">
                                            <div class="form-group has-feedback">
                                                <label class="col-sm-2 control-label">@{{lang.lang_full}}: </label>
                                                <div class="col-sm-8">
                                                 <textarea  v-model="list.text[lang.lang]" class="form-control"></textarea>
                                                 {{--                                                     <input type="text" v-model="list.text[lang.lang]" class="form-control" placeholder="{{trans('backend.Enter Translation')}}"> --}}
                                                 <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                                             </div>
                                         </div>
                                     </div>
                                 </td>
                                 <td class="col-md-2 col-xs-2">@{{list.lang_key}}</td>
                                 <td class="col-md-2 col-xs-2">@{{list.lang_group}}</td>
                                 @level(5)
                                    <td style="text-align: right;"><span class="btn btn-xs btn-danger red" v-on:click="deleteTrans(list.id)"><i class="fa fa-trash-o fa-lg fa-fw"></i></span></td>
                                 @endlevel
                             </tr>
                         </tbody>
                         <tfoot>
                            <tr>
                             <td colspan="100%"><button v-on:click="saveValues" class="form-control btn-success">{{trans('backend.Update')}}</button></td>
                         </tr>
                     </tfoot>
                 </table>
                 <div v-if="pagination.last_item > 1" class="pagination mx-auto">
                    <button class="btn btn-default" v-on:click="fetchItems(pagination.prev_item_url)" :disabled="!pagination.prev_item_url"><i class="fa fa-caret-left"></i></button>
                    <span>{{trans('backend.Page')}} @{{pagination.current_item}} - @{{pagination.last_item}}</span>
                    <button class="btn btn-default" v-on:click="fetchItems(pagination.next_item_url)" :disabled="!pagination.next_item_url"><i class="fa fa-caret-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection
@section('footer_scripts')

<script type="text/javascript" src="/vue/build-query.js"></script>

<script type="text/javascript">
    const app =  new Vue({
        el: '#app',
        data:   {
            groupsList: {},
            langsList: {},
            translationsList: {},
            spinner: true,
            msg: false,
            filterGroup: '',
            filterSearch: '',
            filterQueryObject: {},
            filterQuery: '',
            pagination: {},
            orderType: {},
            deleted: [],
            def: '',
            selected: '',
            validText: ''
        },
        created: function () {
            this.fetchItems();
        },
        watch: {
            msg: _.debounce( function (value) {
                this.msg = false;
            }, 2000),
            filterSearch: _.debounce( function (value) {
                this.filterQueryObject['search'] = value;

                this.filterQuery = httpBuildQuery(this.filterQueryObject);
                this.fetchItems()
            }, 300 ),
        },
        methods: {
            buildQuery: function (filter, value) {
                this.filterQueryObject[filter] = value;

                if (filter == 'order_by') {
                    if (this.orderType[value] == 'asc') {
                        this.orderType[value] = 'desc';
                    } else {
                        this.orderType[value] = 'asc';
                    }
                    this.filterQueryObject['order_type'] = this.orderType[value];
                }

                this.filterQuery = httpBuildQuery(this.filterQueryObject);
                this.fetchItems();
            },
            fetchItems:
            function(item_url) {
                let vm = this;
                this.msg = false;
                this.spinner = true;

                if (item_url) {
                    real_url = item_url + '&' + this.filterQuery;
                } else {
                    real_url =  '/manage/translations/fetchAll?' + this.filterQuery;
                }

                this.$http.get(real_url)
                .then(function (response) {
                    this.spinner = false;
                    this.makePagination(response.body.tr_all);
                    this.groupsList = response.body.tr_groups;
                    this.langsList = response.body.all_langs;
                    this.translationsList = response.body.tr_all.data;
                });
            },
            makePagination: function(data){
                let pagination = {
                    current_item: data.current_page,
                    last_item: data.last_page,
                    next_item_url: data.next_page_url,
                    prev_item_url: data.prev_page_url,
                    to: data.to,
                    from: data.from,
                    total: data.total
                }
                this.pagination = pagination
            },
            saveValues: function () {
                let vm = this;
                this.spinner = true;
                this.msg = false;
                this.$http.post('/manage/translations/updateAll', this.translationsList)
                .then(function (response) {
                    this.spinner = false;
                    this.msg = response.body.msg;
                });
            },
            deleteTrans: function(id) {
                this.$http.post('/manage/translations/deleteTrans', id)
                .then(function (response) {
                    this.deleted.push(id);
                });
            },
        }
    })
</script>

@endsection