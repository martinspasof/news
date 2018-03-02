@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container-vue" v-cloak>
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
                <router-view></router-view>
                <np-table  v-if="!editRoute" :pagination="pagination" :items="items" :controller="controller" item_title="{{ __('backend.' . $itemTitle) }}" :tcontent="tContent" :spinner="spinner" :actions="actions">
                    <span slot="right-buttons">
                        <router-link :to="'/new/'" class="btn btn-primary btn-xs pull-right hidden-xs">
                            <i class="fa fa-plus-circle fa-fw"></i> {{ __('backend.Добави новина') }}
                        </router-link>
                    </span>
                    <h5 slot="modal-header"> @{{ trans('Are you sure you want to delete this item and all the other related fields?') }}</h5>
                </np-table>

                <div v-if="!noMatch && editRoute" class="panel panel-default" v-cloak>
                    <div class="panel-heading clearfix"> @{{ trans('Add new item')}}
                        <span class="pull-right">
                            <button v-on:click="saveValues()" class="btn btn-xs btn-primary" :disabled="spinner"><i class="fa fa-floppy-o fa-fw"></i> @{{ trans('Save') }}</button>
                            <router-link :to="'/'" class="btn btn-danger btn-xs">
                                <i class="fa fa-ban fa-fw"></i> @{{ trans('Back')}}
                            </router-link>      
                        </span>
                    </div>
                    <div class="panel-body">

                        {{ csrf_field() }}

                        <multilang-text v-if="item.lang_fields" v-for="l in langsList" :key="l.id" :l="l" :errors="errors" field="title" input_type="text" :item="item" :clang="currentLang" :class="currentLang == l.lang ?'' : 'hidden'">
                            <span slot="label"> @{{ trans('Title') }} </span>
                        </multilang-text>

                        <input-all :errors="errors" field="slug" input_type="text" :item="item" :required="true">
                        <span slot="label"> @{{ trans('Slug') }} </span>
                    </input-all>

                    <multilang-text v-if="item.lang_fields" v-for="l in langsList" :key="l.id" :l="l" :errors="errors" field="description" input_type="textarea" :item="item" :clang="currentLang" :class="currentLang == l.lang ?'' : 'hidden'">
                        <span slot="label"> @{{ trans('Description') }} </span>
                    </multilang-text>
                    <hr>

                    <single-image :errors="errors" field="pic" :item="item" :required="true"></single-image>

                    <hr>
                    <div class="checkbox">
                        <label>
                        <input name="active" type="checkbox" v-model="item.active" :checked="item.active" > @{{ trans('Active') }}
                        </label>
                    </div>

                    <hr>
                    <button v-on:click="saveValues()" class="btn btn-primary" :disabled="spinner">
                        <i class="fa fa-floppy-o fa-fw"></i> @{{ trans('Save') }}
                    </button>
                    <router-link :to="'/'" class="btn btn-danger">
                        <i class="fa fa-ban fa-fw"></i> @{{ trans('Back') }}
                    </router-link>    
                </div>
            </div>                
        </div>
    </div>
</div>
</div>
@endsection

@section('footer_scripts')

<script type="text/javascript" src="/vue/components/modals/no-body-modal.js"></script>
<script type="text/javascript" src="/vue/components/multilang-text.js"></script>
<script type="text/javascript" src="/vue/components/input-all.js"></script>
<script type="text/javascript" src="/vue/components/single-image.js"></script>
<script type="text/javascript" src="/vue/components/np-table.js"></script>

<script type="text/javascript">
    const Default = {
        template: '<div></div>',
        mounted: function () {
            this.$parent.fetchItems();
            this.$parent.editRoute = false;
        },
        watch: {
            '$route' (to, from) {
                this.$parent.fetchItems();
                this.$parent.editRoute = false;
            }
        }
    }
    const Create = {
        template: '<div></div>',
        mounted: function () {
            this.$parent.setCleanItem();
        },
        watch: {
            '$route' (to, from) {
                this.$parent.setCleanItem();
            }
        }
    }
    const Edit = {
        template: '<div></div>',
        mounted: function () {
            this.$parent.fetchItem(this.$route.params.id);
            this.$parent.editRoute = true;
        },
        watch: {
            '$route' (to, from) {
                this.$parent.fetchItem(this.$route.params.id);
                this.$parent.editRoute = true;
            }
        }
    }

    const router = new VueRouter({
        routes: [
        { path: '/', component: Default },
        { path: '/new', component: Create },
        { path: '/view/:id', component: Edit }
        ]
    })

    var app = new Vue({
        router,
        el: '.container-vue',
        data: {
            tContent: {
                0 : { 
                    title: 'id', 
                    npClass: 'hidden-xs', 
                    val: 'id', 
                    type: 'normal'
                },
                1 : { 
                    title:  trans('Title'), 
                    npClass: '',
                    val: 0, 
                    type: 'multilang' 
                },
                2 : { 
                    title: trans('Status'), 
                    npClass: 'text-center', 
                    val: 'status', 
                    type: 'status' 
                }
            },
            actions: {
                edit: true, 
                delete: true
            },
            editRoute: false,
            spinner: true,
            msg: false,
            items: {},
            showModal: false,
            langsList: [],
            currentLang: '',
            item: {},
            pagination: {},
            errors: {},
            noMatch: false,
            controller: _.last(window.location.pathname.split( '/' ))
        },
        mounted: function () {
            this.fetchLanguages()
        },
        watch: {
            msg: _.debounce( function (value) {
                this.msg = false;
            }, 2000)
        },
        methods: {
            fetchItems:  function(item_url) {
                let vm = this;
                this.spinner = true;
                item_url ? item_url = item_url : item_url =  '/api/' + this.controller + '/list';
                this.$http.get(item_url)
                .then(function (response) {
                    this.spinner = false;
                    this.msg = false;
                    this.pagination = response.body;
                    this.items = response.body.data;
                });
            },
            fetchItem: function(id) {
                this.spinner = true;
                item_url =  '/manage/' + this.controller + '/show?id=' + id;
                this.$http.get(item_url)
                .then(function (response) {
                    if (response.body.status === false) {
                        this.noMatch = true;
                        this.msg = trans('Not Found');
                    } else {
                        this.noMatch = false;
                    }
                    this.msg = false;
                    this.item = response.body;
                    this.spinner = false;
                    this.errors = {};
                }, function(response) {
                    this.spinner = false;
                    this.msg = trans('Error!');
                });
            },
            saveValues: function () {
                let vm = this;
                this.spinner = true;
                this.$http.post('/manage/' + this.controller + '/store', this.item)
                .then(function (response) {
                    this.msg = response.body.msg;
                    this.spinner = false;
                    this.errors = {};
                    router.push({ path: '/view/' + response.body.id })
                }, function (response) {
                    this.errors = response.body.errors;
                    this.msg = false;
                    this.spinner = false;
                });
            },          
            fetchLanguages: function () {
                let vm = this;
                item_url =  '/manage/languages/fetchAllActive';
                this.$http.get(item_url)
                .then(function (response) {
                    this.langsList = response.body;
                    this.currentLang = response.body[0].lang;
                });
            },         
            setCleanItem: function () {
                let vm = this;
                item_url =  '/manage/languages/fetchAllActive';
                this.$http.get(item_url)
                .then(function (response) {
                    var fields = { title: {}, description: {} };
                    response.body.map(function(val) {
                        vm.$set(fields.title, val.lang, {});
                        vm.$set(fields.description, val.lang, {});
                    });

                    vm.item = {           
                        lang_fields: fields, 
                        active: 0,
                        category_id: 0,
                        slug: '',
                        pic: ''
                    }
                    this.editRoute = true;
                    this.spinner = false;
                });
            }     
        }
    });   

</script>
@endsection