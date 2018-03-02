@php

$levelAmount = 'level';

if (Auth::User()->level() >= 2) {
    $levelAmount = 'levels';

}

@endphp


<div class="panel @role('admin', true) panel-info  @endrole">
    <div class="panel-heading" style="background: #666 !important;">

        {{ __('backend.Welcome') }} {{ Auth::user()->name }}

        @role('web-master', true)
        <span class="pull-right label label-primary" style="margin-top:4px">
            {{ __('backend.Web Master Access') }}
        </span>
        @endrole
        @role('admin', true)
        <span class="pull-right label label-info" style="margin-top:4px">
            {{ __('backend.Admin Access') }}
        </span>
        @endrole
        @role('blog-editor', true)
        <span class="pull-right label label-warning" style="margin-top:4px">
            {{ __('backend.Blog Editor Access') }}
        </span>
        @endrole
        @role('user', true)
        <span class="pull-right label label-default" style="margin-top:4px">
            {{ __('backend.User Access') }}
        </span>
        @endrole

    </div>
    <div class="panel-body">
        <h2 class="lead">
            {{ trans('auth.loggedIn') }}
        </h2>
        <hr>

        <h4>
            {{ __('backend.You have') }}
            @role('web-master', true)
                {{ __('backend.Web Master Access') }}
            @endrole
            @role('admin', true)
                {{ __('backend.Admin Access') }}
            @endrole
            @role('blog-editor', true)
                {{ __('backend.Blog Editor Access') }}
            @endrole
            @role('user', true)
                {{ __('backend.User Access') }}
            @endrole
        </h4>

        <hr>

{{--         <h4>
             {{ __('backend.You have access to') }} {{ $levelAmount }}:
            @level(5)
            <span class="label label-primary margin-half">5</span>
            @endlevel

            @level(4)
            <span class="label label-info margin-half">4</span>
            @endlevel

            @level(3)
            <span class="label label-success margin-half">3</span>
            @endlevel

            @level(2)
            <span class="label label-warning margin-half">2</span>
            @endlevel

            @level(1)
            <span class="label label-default margin-half">1</span>
            @endlevel
        </h4> --}}
    </div>
</div>