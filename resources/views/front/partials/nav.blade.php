<header class="modal-header-nav">
    <div class="top-line-header">
        <a href="/"><img src="{{ url('/img/logo-news.png') }}" class="img-fluid logo" alt="logo"></a>
        <div class="top-line-header-right">
            <div class="top-phone">
                <img src="{{ url('/img/phone-icon.png') }}" class="phone-icon" alt="phone">
                <span>+359 123 456 789</span>
            </div>
            <div class="send-email-top" style="border:none">
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li style="width: 5%;" class="nav-item {{ Request::is('*news') || Request::is('*news/*') ? 'active' : null }}">
                    <a class="nav-link" href="{{ url('/') }}">{{ trans('frontend.News') }}</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
</header>