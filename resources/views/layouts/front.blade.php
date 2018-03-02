<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta id="token" name="csrf-token" content="{{ csrf_token() }}">

        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="/favicon.ico">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{-- Fonts --}}

        {{-- Styles --}}
            <link rel="manifest" href="site.webmanifest">
        {{--<link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">--}}
        {{--<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">--}}
        <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        @yield('head')
        
        {{--<script src='https://www.google.com/recaptcha/api.js'></script>--}}
    </head>
    <body>
            @include('front/partials.nav')
            @yield('content')
        {{-- Scripts --}}
        @include('front/partials.footer')
        <script src="/js/particles.min.js"></script>
        <script>
            /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
            particlesJS.load('particles-js', '{{ url('/js/particlesjs-config.json') }}', function() {
              console.log('callback - particles.js config loaded');
          });
      </script>   
      <script src="/js/popper.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>
      <script src="/js/front-main.js"></script>
        
      <script src=" {{ url('/js/vue/dist/vue.min.js') }}"></script>
      <script src=" {{ url('/js/vue-resource.min.js') }}"></script>
      <script src=" {{ url('/js/lodash.js') }}"></script>
      <script type="text/javascript">Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');</script>

        {!! HTML::script('//maps.googleapis.com/maps/api/js?key='.env("GOOGLEMAPS_API_KEY").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!}

        @yield('footer_scripts')

        <script type="text/javascript" src="{{ url('/vue/build-query.js') }}"></script>

        <script type="text/javascript">

            var app = new Vue({
                el: '.container-vue',
                data: {
                    spinner: false,
                    msg: true,
                    items: {},
                    filterSearch: '',
                    filterQueryObject: {},
                    filterQuery: '',
                    foundPosts: 0,
                    foundServices: 0,
                    foundApplications: 0,
                },
                watch: {
                    filterSearch: function (value) {
                        this.filterQueryObject['search'] = value;

                        this.filterQuery = httpBuildQuery(this.filterQueryObject);
                        this.fetchItems()
                    },
                },
                methods: {
                    fetchItems:  _.debounce( function(item_url) {
                        let vm = this;
                        this.spinner = true;
                        item_url ? item_url = item_url + '&' + this.filterQuery : item_url =  '/search?' + this.filterQuery;
                        this.$http.get(item_url)
                        .then(function (response) {
                            this.spinner = false;
                            this.items = response.body;

                            if (this.items.status) {
                                this.msg = false;
                                this.foundPosts = Object.keys(this.items.posts).length;
                                this.foundServices = Object.keys(this.items.services).length;
                                 this.foundApplications = Object.keys(this.items.applications).length;
                            } else {
                                this.msg = true;
                                this.foundPosts = 0;
                                this.foundServices = 0;
                                this.foundApplications = 0;
                            }
                        });
                    }, 300 ),
                }
            });   
        </script>

    </body>
</html>