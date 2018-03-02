<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Хокей магазин - кънки на лед, стикове, каски, хокейна екипировка, ролери</title>
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="title" content="Хокей магазин - кънки на лед, стикове, каски, хокейна екипировка, ролери. | Хокей и кънки за лед">
    <meta name="description" content="Магазин за хокей на лед и колела, инлайн хокей, кънки, стикове, каски, протектори и хокейно облекло. Хокейна екипировка и велосипеди.">
    
    <script src="https://use.fontawesome.com/1f1fa1e0ca.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/vue@2.5.0/dist/vue.js"></script> 
    <script src="https://unpkg.com/vue-resource@1.3.4/dist/vue-resource.js"></script> 
    <script src="https://unpkg.com/vue-router@3.0.1/dist/vue-router.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-cookies@1.5.4/vue-cookies.min.js"></script>

       <!-- <script src="https://unpkg.com/vue@2.5.0/dist/vue.min.js"></script>  -->
       <!-- <script src="unpkg.com/vue-router.min.js"></script>  -->
     <!-- <script src="https://unpkg.com/vue-resource/dist/vue-resource.min.js"></script>  -->
     <!-- <script src="https://unpkg.com/vue-meta@1.3.1/lib/vue-meta.min.js"></script> -->
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:400&subset=cyrillic,latin" />
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,400italic|Open+Sans+Condensed:300,300italic,700|Roboto+Condensed:300italic,400italic,400,700,300|Roboto:400,500,300|Oswald:400,300|Yanone+Kaffeesatz:400,200,300|Rancho:400" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700&amp;subset=cyrillic" rel="stylesheet">
    <!-- slider -->

    <link href="http://fonts.googleapis.com/css?family=Lora:400%2C500%7CCinzel:400" rel="stylesheet" property="stylesheet" type="text/css" media="all">
    
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">

</head>

<body>


<div id="app" class="container-fluid">
<!-- <div id="app" class="container"> -->

<div class="row header mb-md-3">
    <div class="col-lg-3 col-md-4 col-sm-12 text-center hockey">
        <a href="{{ url('/') }}">
            <img v-on:mouseover="puck = true" v-on:mouseout="puck = false" class="brand img-fluid" src="{{ asset('public/images/logo.png') }}" alt="">
        </a>

        <transition name="puckmove">
            <img v-if="puck || spinner" class="puck" src="{{ asset('public/images/puck.png') }}" alt="">
        </transition>
    </div>

    <div class="col-lg-9 col-md-8 col-sm-12 text-right">

        <nav class="navbar navbar-expand-md navbar-light text-left">
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler  pull-right" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
            <i class="fa fa-rw fa-bars"></i> меню
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
            @foreach($pages as $page)

                <li class="nav-item">
                    <router-link to="/page/{{ $page->slug }}" class="nav-link router-link">{{ $page->title }}</router-link>
                </li>

            @endforeach
            </ul>
            <!-- <small class="link pull-right"> <i class="fa fa-rw fa-shopping-basket"></i>   </small> -->
        </div>
        </nav>

    </div>
</div>



<div class="row">
    <div class="col-lg-3 col-md-4">
        <strong class="d-none d-md-block">Категории</strong>
        <nav class="nav navbar-light  navbar-expand-md navbar-toggleable-sm">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#categories-navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-rw fa-bars"></i> категории
            </button>
            <hr>
            <div class="navbar-collapse collapse flex-column " id="categories-navbar">
            @foreach($categories as $cat)
                @if(isset($cat->subcategories['0']) and $cat->subcategories['0']->title !== null) 
                <li class="nav-item nav-item-dropdown dropdown router-link">

                    <a v-if="category && category.parent_id == {{ $cat->id }}" class="dropdown-toggle router-link-active"  id="navbarDropdownMenuLink_{{ $cat->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{ $cat->title }} </a>
                    <a v-else class="dropdown-toggle"  id="navbarDropdownMenuLink_{{ $cat->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $cat->title }} </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink_{{ $cat->id }}">
                        @foreach($cat->subcategories as $child)
                        <router-link :to="{ path: '/shop/{{ $cat->slug }}/{{ $child->slug }}' }" class="nav-link dropdown-item router-link">{{ $child->title }}</router-link>
                        @endforeach
                    </div>

                </li>
                @else
                <li class="nav-item">
                    <router-link :to="{ path: '/shop/{{ $cat->slug }}' }" class="nav-link">{{ $cat->title }}</router-link>
                </li>
                @endif
            @endforeach



            </div>
        </nav>

        <hr>

        <div class="row mb-3">
            <div class="col-12">
            <strong>Търсене</strong>
                <transition name="fade" mode="out-in">
                    <small  v-if="searchStr && itemCount > 0" class="pull-right">
                        <span class="text-success">@{{ itemCount }}</span> резултата</i></span>
                    </small>
                    <small  v-if="searchStr && itemCount == 0" class="pull-right">
                        <span class="text-danger">0</span> резултата</span>
                    </small>
                </transition>
            </div>
            <div class="input-group col-12">
                <input v-model="searchStr" v-on:keyup="searchRoute()" type="text" class="form-control form-control-sm" aria-label="търсене" aria-describedby="basic-addon" placeholder="въведи ключова дума за да търсиш" >
                <span class="input-group-addon" id="basic-addon"><i class="fa fa-rw fa-search"></i></span>
            </div>
        </div>

        <div v-if="category && category.attributes != ''">
            <hr>
            <a v-if="category.attributes != ''" v-on:click="sortByAttributes('reset')" class="pull-right btn-reset" href="#">изчисти</a>
            <div v-for="attribute in category.attributes" class="pb-3 mb-3 attributes-box">
                <strong>@{{ attribute.title }}</strong>
                <div class="row">
                    <div v-on:click="sortByAttributes(value.id)" v-for="value in attribute.values" v-if="attribute.values" class="attribute-option col-lg-6 col-md-12 col-sm-6 col-6">
                        <i v-bind:class="[ ( sortAttributes[value.id] )? 'fa-circle' : 'fa-circle-o', 'fa' ]"></i> <small>@{{ value.value }}</small>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="col-lg-9 col-md-8 shopWrapper">
    
        <router-view></router-view>
        
        <div class="heading">
        <transition name="fade" mode="out-in" >
            <h2 v-if="category && !searchStr && !product">@{{ category.title }}</h2>
            <h2 v-if="product">@{{ product.title }}</h2>
            <h2 v-if="searchStr && searchStr.length > 0">Търсене</h2>
            <h2 v-if="!category && !searchStr && !product">Хокей магазин</h2>
        </transition>
        </div>
    

        <transition name="fade" mode="out-in" >
        <div v-if="!product" class="my-flex-card">

            <pagination-component :paginationcomponentcount="paginationcomponentcount" :pagination="pagination" v-if="itemCount > pagination.per_page"></pagination-component>

     
            <transition name="fade" mode="out-in" >
            <div v-if="itemCount > 0" v-bind:key='1'>

                <div class="row sort-controls">
                    <div class="col-4" v-on:click="sortBy('title')">
                        Име <i v-if="sortKey == 'title'" v-bind:class="[ (sortKey == 'title' && reverse == 1 ) ? 'fa fa-chevron-up' : 'fa fa-chevron-down', 'colorMain' ]"></i>
                    </div>
                    <div class="col-4 divider-mid" v-on:click="sortBy('price')">
                        Цена <i v-if="sortKey == 'price'" v-bind:class="[ (sortKey == 'price' && reverse == 1 ) ? 'fa fa-chevron-up' : 'fa fa-chevron-down', 'colorMain' ]"></i>
                    </div>
                    <div class="col-4" v-on:click="sortBy('created_at')">
                        Дата <i v-if="sortKey == 'created_at'" v-bind:class="[ (sortKey == 'created_at' && reverse == -1 ) ? 'fa fa-chevron-up' : 'fa fa-chevron-down', 'colorMain' ]"></i>
                    </div>
                </div>

                <transition-group name="fade" mode="out-in" tag="div" class="row row-eq-height  mt-3">
                <router-link :to="{ path: '/shop/'+item.categorySlug+'/'+item.subcategorySlug+'/'+item.slug }" v-for="item in items" v-bind:key="item" class="col-lg-4 col-md-6 col-sm-6 col-12 router-link">
                        <div class="item col-md-12 my-lg-2 my-2 mx-auto">
                            <strong class="pull-left">@{{ item.title }}</strong><br>
                            <router-link :to="{ path: '/shop/'+item.categorySlug+'/'+item.subcategorySlug }" class="router-link">
                                <small class="pull-left item-category-link">@{{ item.subcategoryTitle }}</small>
                            </router-link>

                            <br>
                            <div class="item-image-wrapper">
                                <div v-bind:style="{ backgroundImage: 'url(' + item.main_image_blur + ')' }" class="item-image-background"></div>
                                <div v-bind:style="{ backgroundImage: 'url(' + item.main_image + ')' }" class="item-image"></div>
                            </div>

                            <small class="text-muted">@{{ item.post_time }}</small>

                            <span v-if="item.discount==0" class="item-price">@{{ formatBalance(item.price) }} лв.</span>
                            <span v-else class="item-price">
                                <span class="line-str">@{{ formatBalance(item.price) }} лв. </span>
                               @{{ formatBalance(item.discount) }} лв.
                            </span>
                        </div>
                </router-link>
                </transition-group>
            </div>
            <div v-else v-bind:key="66666" class="row pt-5 pb-5">
                <div class="col-lg-12 text-danger">Няма намерени продукти 
                    <span v-if="searchStr && searchStr.length > 0">за <span class="mark">@{{ searchStr }}</span>!</span>
                    <span v-if="category">в <span class="mark">@{{ category.title }}</span>!</span>
                </div>
            </div>
            </transition>

            <hr>
            <pagination-component :paginationcomponentcount="paginationcomponentcount+1" :pagination="pagination" v-if="itemCount > pagination.per_page"></pagination-component>
            
        </div>

        <div v-if="product">
            <div class="row bcrumb pl-3 pl-md-0 mb-2 d-none d-sm-block">
                <a class="router-link-icon" href="{{ url('/') }}" title="Хокей магазин - кънки на лед, стикове, каски, хокейна екипировка, ролери."><i class="fa fa-rw fa-home"></i></a>
                <i class="fa fa-rw fa-long-arrow-right mx-2"></i>
                <router-link :to="{ path: '/shop/'+category.parent.slug }" class="router-link">@{{ category.parent.title }}</router-link>
                <i class="fa fa-rw fa-long-arrow-right mx-2"></i>
                <router-link :to="{ path: '/shop/'+category.parent.slug+'/'+category.slug }" class="router-link">@{{ category.title }}</router-link>
            </div>
            <transition name="fade" mode="out-in">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="row product-image-wrapper">
                        <div v-bind:style="{ backgroundImage: 'url(' + product.main_image_blur + ')' }" class="product-image-background"></div>
                        <div v-bind:style="{ backgroundImage: 'url(' + product.main_image + ')' }" class="product-image"></div>
                    </div>
                    <div class="row mt-2" v-if="product.gallery">
                        <div v-for="image in product.gallery" class="col-lg-3 col-md-3 col-sm-4 col-6 p-4 product-image-wrapper">
                            <div v-bind:style="{ backgroundImage: 'url(' + image.blur + ')' }" class="product-image-background"></div>
                            <div v-bind:style="{ backgroundImage: 'url(' + image.thumb + ')' }" class="product-image-thumb"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    @{{ product.description }}
                </div>
            </div>
            </transition>      
        </div>

        <!-- * -->      
        </transition>


    </div>

</div>

<!-- <div class="spinner spinner-shadow text-center" v-if="spinner">
    <div   v-bind:class="[ ( spinner == '1337' ) ? 'spinner-stop' : '', 'spinner-start' ]">
        <i v-bind:class="[ ( spinner == '1337' ) ? '' : '', 'fa fa-snowflake-o fa-spin' ]"></i>
    </div>
    <span class="sr-only">Loading...</span>
</div> -->

@yield('content')   

<i class="fa fa-rw fa-chevron-circle-up" onclick="topFunction()" id="toTop" title="Go to top"></i>

</div>

<script>
Vue.http.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('#token').content;
var jstoken = document.head.querySelector('#token').content;
</script>


<script>
// ez pz console log and alert
const dd = function($var) {
    console.log($var);
}

const aa = function($var) {
    alert($var);
}
// ================================
// fix bootstrap collapse navbar auto hide on click
$( document ).ready(function() {
    $('.nav-link').click(function(){
        $('.navbar-collapse').collapse('hide');
    });
});
//######

// ================================
// back to the top 
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("toTop").style.display = "block";
    } else {
        document.getElementById("toTop").style.display = "none";
    }
}
var topFunction = function() {
    document.body.scrollTop = 0; // For Chrome, Safari and Opera 
    document.documentElement.scrollTop = 0; // For IE and Firefox
}
//######



const Pagination = Vue.component('pagination-component', {
    props: ['pagination','paginationcomponentcount'],
    template: '<div class="row"><small v-if="paginationcomponentcount == 0" class="page-label">Страница @{{pagination.current_item}} от @{{pagination.last_item}}</small><div class="pagination mx-auto"><button class="btn btn-default" v-on:click="fetchItems(pagination.prev_item_url)" :disabled="!pagination.prev_item_url"><i class="fa fa-rw fa-caret-left"></i> предишна </button><button class="btn btn-default" v-on:click="fetchItems(pagination.next_item_url)" :disabled="!pagination.next_item_url"> следваща <i class="fa fa-rw fa-caret-right"></i></button></div></div>',
    mounted: function(){

    },
    methods: {
        fetchItems: function(url){
            app.fetchItems(url);
        }
    }
})


// ================================
// the magic
const API_URL = '{{ url("/")}}/public/'
const SITE_TITLE = 'Хокей магазин - кънки на лед, стикове, каски, хокейна екипировка, ролери.'
const SITE_DESCRIPTION = 'Магазин за хокей на лед и колела, инлайн хокей, кънки, стикове, каски, протектори и хокейно облекло. Хокейна екипировка и велосипеди.'

const Page = { template: '<div>Page  @{{ $route.params.slug }}</div>' }

const Category = {  
                        template: '<div></div>',
                        created: function() {  
                                this.$parent.getSortKey()
                                this.$parent.fetchItems()
                                this.$parent.getCategory()
                        },
                        watch: {
                            '$route': function(to, from) {
                                this.$parent.getSortKey()
                                this.$parent.fetchItems()
                                this.$parent.getCategory()
                            }
                        }
                    }; 


const Product = {  
                        template: '<div></div>',
                        created: function() {
                                this.$parent.getProduct(this.$route.params.product_slug);
                        },
                        watch: {
                            '$route': function(to, from) {
                                this.$parent.getProduct(this.$route.params.product_slug)
                            }
                        }
                    };  

const Search = {  
                        template: '<div></div>',
                        created: function() {
                                this.$parent.search(this.$route.params.keyword);
                        },
                        watch: {
                            '$route': function(to, from) {
                                this.$parent.search();
                            }
                        }
                    };   


const routes = [
  { 
    path: '/shop', 
    component: Category,
    name: 'shop'
    },
  { 
    path: '/shop/:slug', 
    component: Category,
    },
  { 
    path: '/shop/:slug/:sub', 
    component: Category,
    },
  { 
    path: '/shop/:slug/:sub/:product_slug', 
    component: Product,
    },
  { 
    path: '/search/:keyword', 
    component: Search,
    name: 'search'
    },
  { 
    path: '/page/:slug', 
    component: Page
    },
  { 
    path: '*', redirect: '/shop' 
    },

];

const router = new VueRouter({
    // mode: 'history',
    routes // short for `routes: routes`
})

router.beforeEach((to, from, next) => {
    router.app.spinner = true;
    next()
})

router.beforeResolve((to, from, next) => {
    setTimeout(function() { router.app.spinner = '1337'; }, 301)
    next()

})

router.afterEach((to, from) => {
    setTimeout(function() { router.app.spinner = false; }, 551)
})


const app =  new Vue({
        router,
        data () {
        return {
                // loggedUser: null,
                // isActive: false,
                // showFooterBox: false,
                // email: null,
                // password: null, 
                // loginemail: null,
                // loginpassword: null,
                // passwordrepeat: null,
                // username: null,
                // success: null,
                // error: null,
                // loginerror: null,
                // loginsuccess: null,
                product: false,
                sortAttributes: {},
                sortAttributesStr: '',
                sortKey: 'price',
                reverse: 1,
                spinner: true,
                searchStr: null,
                category: null,
                items: {},
                puck: false,
                itemCount: 1,
                pagination: {},
                paginationcomponentcount: 0
        }        },
        mounted: function () {

            let vm = this;

        },
        components: {
            'pagination-component': Pagination
          },
        computed: {
            getQuery: function(){
                let vm = this;
                res = '';

                if(vm.$route.params.slug){ 
                    res = '&category='+vm.$route.params.slug;
                    if(vm.$route.params.sub){
                        res = res+'&subcategory='+vm.$route.params.sub
                    }
                }

                if(vm.sortKey && vm.reverse){ 
                    res = res+'&sort='+vm.sortKey;
                    if(vm.reverse == 1)
                        res = res+'&sort_type=ASC';
                    else 
                        res = res+'&sort_type=DESC';
                }

                if(vm.sortAttributesStr && vm.sortAttributesStr.length > 0){ 
                    res = res+'&sortAttr='+vm.sortAttributesStr;
                }

                if(vm.searchStr && vm.searchStr.length > 0){ 
                    res = res+'&search='+vm.searchStr;
                }

                return res;
            }
        },
        methods: {
            getSortKey: function() {
                let vm = this;
                if(vm.$cookies.isKey("sortKey") == false)
                    vm.$cookies.set("sortKey", "price", 259200); // 1month
                if(vm.$cookies.isKey("reverse") == false)
                    vm.$cookies.set("reverse", 1, 259200); // 1month

                vm.sortKey = vm.$cookies.get("sortKey");
                vm.reverse = vm.$cookies.get("reverse");
            },
            searchRoute: function(){
                let vm = this;
                if(vm.searchStr && vm.searchStr.length > 0)
                    router.push({ name: 'search', params: { keyword: vm.searchStr }});
                else {
                    vm.fetchItems();
                    router.push({ name: 'shop' });
                }
            },
            search: function(keyword){
                let vm = this;

                if(keyword && keyword.length > 0)
                    vm.searchStr = keyword;
                // ne se znae za kvo beshe
                // vm.$route.params.slug

                if(vm.searchStr.length > 0){
                    vm.fetchItems('{{ url("api/get_by_category") }}/?search='+vm.searchStr)
                    vm.getCategory()
                }
                else{
                    vm.fetchItems()
                    vm.getCategory()
                }
            },
            sortBy: function(sortKey) {
                let vm = this;
                reverse = (vm.reverse == -1) ? 1 : -1;
                vm.reverse = reverse
                vm.sortKey = sortKey;
                vm.$cookies.set("sortKey", sortKey, 259200) // 1month
                vm.$cookies.set("reverse", reverse, 259200) // 1month

                vm.fetchItems();

            },
            sortByAttributes: function(attr_id) {
                let vm = this;
                vm.spinner = true;

                if(!vm.sortAttributes[attr_id])
                    vm.sortAttributes[attr_id] =  attr_id;
                else 
                    delete vm.sortAttributes[attr_id];

                vm.sortAttributesStr = '';
                for(item in vm.sortAttributes){
                    vm.sortAttributesStr =  vm.sortAttributesStr + item + ',';
                }

                if(attr_id == 'reset') {
                    vm.sortAttributes = [];
                    vm.sortAttributesStr = null;
                }


                
                setTimeout(function() { vm.spinner = '1337'; }, 301)
                setTimeout(function() { vm.spinner = false; }, 551)

                vm.fetchItems();
            },
            getProduct: function(product_slug){
                let vm = this;

                if(!product_slug)
                    return false;

                if(vm.$route.name != 'search')
                    vm.searchStr = null;

                item_url = '{{ url("api/get_product/") }}/'+product_slug;
                this.$http.get(item_url)
                    .then(function (response) {
                        vm.product = response.data
                        vm.category = vm.product.category

                        title = '';
                        description = '';
                        if(vm.product) {
                            title = vm.product.title;
                            description = vm.product.description;
                        }

                        vm.updateMetaTags(title, description)

                        

                    }, function() {
                        
                    });

            },
            fetchItems: function(item_url, page) {
                let vm = this;
                    
                vm.product = false;

                if(vm.$route.name != 'search')
                    vm.searchStr = null;

                item_url =  item_url || '{{ url("api/get_by_category") }}/?';
                item_url = item_url+this.getQuery;
                

                this.$http.get(item_url)
                    .then(function (response) {

                        vm.makePagination(response.data)

                        vm.items = response.data.data

                    }, function() {
                        
                    });
            },            
            getCategory: function(item_url) {
                let vm = this;
                getQuery = '';

                if(item_url)
                    item_url = item_url+this.getQuery;

                item_url =  item_url || '{{ url("api/get_category_info") }}?'+this.getQuery;
                this.$http.get(item_url)
                    .then(function (response) {
                        vm.category = response.data

                        title = '';
                        description = '';
                        if(vm.category) {
                            title = vm.category.title;
                            description = vm.category.description;
                        }

                        vm.updateMetaTags(title, description)
                       

                    }, function() {
                    });

            },
            makePagination: function(data){
                let vm = this;

                let pagination = {
                    per_page : data.per_page,
                    current_item: data.current_page,
                    last_item: data.last_page,
                    next_item_url: data.next_page_url,
                    prev_item_url: data.prev_page_url
                }
                vm.itemCount = 0;
                if(data.total > 0)
                    vm.itemCount = data.total
                vm.pagination =  pagination
                Pagination.pagination = pagination
                // this.pagination = pagination
            },      
            updateMetaTags: function(title, description) {

                metaTitle = SITE_TITLE;
                if(title)
                    metaTitle = title+' | '+SITE_TITLE;

                metaDescription = SITE_DESCRIPTION;
                if(description)
                    metaDescription = description;

                document.title = metaTitle;
                document.head.querySelector('meta[name=title]').content = metaTitle;
                document.head.querySelector('meta[name=description]').content = metaDescription;       
            },
            formatBalance(value) {
                let val = (value/1).toFixed(2).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            },
            formatDate: function(value){
                    var d = new Date(value);
                    var curr_date = d.getDate();
                    var curr_month = d.getMonth() + 1; //Months are zero based
                    var curr_year = d.getFullYear();
                    return (curr_date + "." + curr_month + "." + curr_year);
            }

        }
    }).$mount('#app')

</script>
</body>
</html>
