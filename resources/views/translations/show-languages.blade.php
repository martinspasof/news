@extends('layouts.app')

@section('template_title')
{{trans('backend.Languages')}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div v-cloak class="panel panel-default" id="app">
                <div class="panel-heading">
                    <div  class="col-sm-12" style="display: flex; justify-content: space-between; align-items: center;">
                        {{trans('backend.Showing All Languages')}}
                        <span v-cloak v-if="msg" class="text-danger">@{{msg}}</span>
                        <div class="btn-group pull-right btn-group-xs">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <input type="text" v-model="filterSearch" name="search-filter" class="form-control" placeholder="{{trans('backend.Search')}}">
                        <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="progress">
                    <div class="indeterminate" v-if="spinner"></div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive users-table">
                        <table class="table table-striped table-condensed data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{trans('backend.Abbreviation')}}</th>
                                    <th>{{trans('backend.Language')}}</th>
                                    <th style="text-align: right;">{{trans('backend.Actions and Status')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="lang in langsList">
                                    <td>@{{lang.id}}</td>
                                    <td>@{{lang.lang}}</td>
                                    <td>@{{lang.lang_full}}</td>
                                    <td style="text-align: right;">
                                        <span class="btn btn-xs btn-success green" v-if="lang.status" v-on:click="changeStatus(lang.id, 0); lang.status = 0;" :disabled="lang.default_lang == 1">{{trans('backend.Active')}}</span>
                                        <span class="btn btn-xs btn-danger orange" v-else v-on:click="changeStatus(lang.id, 1); lang.status = 1;">{{trans('backend.Disabled')}}</span>
                                        <span class="btn btn-xs  btn-primary purple" v-if="lang.default_lang" disabled>{{trans('backend.Default')}}</span>
                                        <span class="btn btn-xs btn-default grey" v-else v-on:click="changeDefault(lang.id)">{{trans('backend.Default')}}</span>
                                        <span class="btn btn-xs btn-danger red" :disabled="lang.default_lang == 1" v-on:click="deleteLang(lang.id)"><i class="fa fa-trash-o fa-lg fa-fw"></i></span>
                                    </td>
                                </tr>
                                <tr class="form-horizontal teal lighten-5">
                                    <td>#</td>
                                    <td>
                                        {{ __('backend.Add New Language') }}
                                    </td>
                                    <td>
                                        <select class="form-control" v-model="newLang">
                                            <option v-bind:value="0">{{trans('backend.All Languages')}}</option>
                                            <option v-for="l in allLangsList"  v-bind:value="l.id">@{{l.lang_full}}</option>
                                        </select>
                                    </td>
                                    <td style="text-align: right;"><button class="btn btn-success" v-on:click="addLang()">{{trans('backend.Add')}}</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <no-body-modal v-if="showModal">
                    <h5 slot="header">{{trans('backend.Are you sure you want to delete this item and all the other related fields?')}}</h5>
                    <div slot="footer">
                        <button class="btn btn-default" @click="showModal = false">{{trans('backend.No')}}</button>
                        <button class="btn btn-success" @click="confirmDelete()">{{trans('backend.Yes')}}</button>
                    </div>
                </no-body-modal>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer_scripts')

<script type="text/javascript" src="/vue/components/modals/no-body-modal.js"></script>

<script type="text/javascript">

    const app =  new Vue({
        el: '#app',
        data:   {
            langsList: {},
            allLangsList: {},
            spinner: true,
            msg: false,
            filterSearch: '',
            filterQueryObject: {},
            filterQuery: '',
            newLang: 0,
            showModal: false,
            deleteId: ''
        },
        created: function () {
            this.fetchItems();
        },
        watch: {
            filterSearch: _.debounce( function (value) {
                this.filterQueryObject['search'] = value;

                this.filterQuery = httpBuildQuery(this.filterQueryObject);
                this.fetchItems()
            }, 300)
        },
        methods: {
            fetchItems:
                function(item_url) {

                    this.msg = false;
                    this.spinner = true;

                    if (item_url) {
                        real_url = item_url + '&' + this.filterQuery;
                    } else {
                        real_url =  '/manage/languages/fetchAll?' + this.filterQuery;
                    }

                    this.$http.get(real_url)
                    .then(function (response) {
                        this.spinner = false;
                        this.langsList = response.body.all_langs;
                        this.allLangsList = response.body.list_langs;
                    });
                },
            changeDefault: function(id) {
                this.$http.post('/manage/languages/changeDefault', id)
                .then(function (response) {
                    this.msg = response.body.msg;
                    this.fetchItems();
                });
            },
            changeStatus: function(id, status) {
                this.msg = false;

                postData = {};
                postData.id = id;
                postData.status = status;
                this.$http.post('/manage/languages/changeStatus', postData)
                .then(function (response) {
                    this.msg = response.body.msg;
                    this.fetchItems();
                });
            },
            deleteLang: function(id) {
                this.showModal = true;
                this.deleteId = id;
            },
            confirmDelete: function() {
                this.$http.post('/manage/languages/deleteLang', this.deleteId)
                .then(function (response) {
                    this.msg = response.body.msg;
                    this.showModal = false;
                    this.deleteId = '';
                    this.fetchItems();
                });
            },
            addLang: function() {
                if (this.newLang == 0) {
                    this.msg = 'Please choose language';
                    return false;
                }
                this.$http.post('/manage/languages/addLang', this.newLang)
                .then(function (response) {
                    this.msg = response.body.msg;
                    this.newLang = 0;
                    this.fetchItems();
                });
            }
        }
    })

    var httpBuildQuery = function(params) {
        if (typeof params === 'undefined' || typeof params !== 'object') {
            params = {};
            return params;
        }
        var query = '';
        var index = 0;
        for (var i in params) {
            index++;
            var param = i;
            var value = params[i];
            if (index == 1) {
                query += param + '=' + value;
            } else {

                query += '&' + param + '=' + value;
            }
        }
        return query;
    };
</script>
@endsection