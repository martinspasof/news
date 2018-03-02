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
        @yield('template_linked_fonts')

        {{-- Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

        <link href="{{ asset('/css/np.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/flag-icon.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/upgrade.css') }}" rel="stylesheet">

        @yield('template_linked_css')

        <style type="text/css">
            @yield('template_fastload_css')

            @if (Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0))
                .user-avatar-nav {
                    background: url({{ Gravatar::get(Auth::user()->email) }}) 50% 50% no-repeat;
                    background-size: auto 100%;
                }
            @endif

        </style>

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        @if (Auth::User() && (Auth::User()->profile) && $theme->link != null && $theme->link != 'null')
            <link rel="stylesheet" type="text/css" href="{{ $theme->link }}">
        @endif

        @yield('head')

    </head>
    <body>
        <div id="app">

            @include('partials.nav')

            <div class="container">

                @include('partials.form-status')

            </div>

            @yield('content')

        </div>

        {{-- Scripts --}}

        <script src="{{ mix('/js/app.js') }}"></script>
        <script src=" {{ url('/js/vue-resource.min.js') }}"></script>
        <script src=" {{ url('/js/vue-router.js') }}"></script>
        <script type="text/javascript">Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');</script>

        <script>
            window.fields = <?php
            $trans_array = Spatie\TranslationLoader\LanguageLine::getTranslationsForGroup(Session::get('locale'), 'backend');
            echo json_encode($trans_array, JSON_UNESCAPED_UNICODE);
            ?>;
            window.level = <?php echo Auth::User() ? Auth::User()->level() : NULL; ?>;
        </script>

        <script type="text/javascript">
          Vue.directive('focus', function (el, binding) {
              if (binding.value.error) {
               el.focus()
           }
       })

          Vue.prototype.trans = (key) => {
            if (Object.keys(window.fields[key]).length > 0) {
                return window.fields[key];
            } else {
                return key;
            }
        };
        </script>
        <script type="text/javascript" src="{{ url('/vue/build-query.js') }}"></script>
        <script type="text/javascript" src="{{ url('/vue/trans.js') }}"></script>
        <script type="text/javascript" src="{{ url('/vue/roles.js') }}"></script>
        @yield('footer_scripts')
    </body>
</html>