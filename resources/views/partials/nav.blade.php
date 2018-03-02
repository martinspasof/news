<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            {{-- Collapsed Hamburger --}}
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">{!! trans('backend.toggleNav') !!}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{-- Branding Image --}}
            <a class="navbar-brand" href="{{ url('/manage') }}">
                {!! config('app.name', trans('backend.app')) !!}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            {{-- Left Side Of Navbar --}}
            <ul class="nav navbar-nav">

                @level(4)

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{trans('backend.News')}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li {{ Request::is('news') ? 'class=active' : null }}>{!! HTML::link(route('news'), trans('backend.Списък новини')) !!}</li>
                        <li>{!! HTML::link(url('manage/news#/new'), trans('backend.Добави новина')) !!}</li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{trans('backend.Users')}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li {{ Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'class=active' : null }}>{!! HTML::link(url('/users'), trans('backend.adminUserList')) !!}</li>
                        <li {{ Request::is('users/create') ? 'class=active' : null }}>{!! HTML::link(url('/users/create'), trans('backend.adminNewUser')) !!}</li>
                    </ul>
                </li>
                @endlevel
            </ul>

            {{-- Right Side Of Navbar --}}
            <ul class="nav navbar-nav navbar-right">
                {{-- Authentication Links --}}
                @if (Auth::guest())
                <li><a href="{{ route('login') }}">{!! trans('backend.Login') !!}</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                        @if (Auth::User()->profile && Auth::user()->profile->avatar_status == 1)
                        <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}" class="user-avatar-nav">
                        @else
                        <div class="user-avatar-nav"></div>
                        @endif

                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li {{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'class=active' : null }}>
                            {!! HTML::link(url('/profile/'.Auth::user()->name), trans('backend.profile')) !!}
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {!! trans('backend.logout') !!}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div>
</nav>
