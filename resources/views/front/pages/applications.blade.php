@extends('layouts.front')

@section('template_title')
          {{ __('frontend.Приложения') }}
@endsection

@section('head')
@endsection

@section('content')
<div class="applications-page">
    <div class="applications-jumbotron">
        <div class="text-a-j">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 app-text-max-width">
                        {!! __('frontend.Възможностите за приложение на 3D технологиите са безкрайни') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="a-j-arrow text-center">
            <div class="a-j-arrow-text">{!! __('frontend.Вижте примери от работата ни') !!}</div>
            <img id="down-app-btn" src="{{ url('/img/down-arrow.png') }}" alt="down-arrow">
        </div>
    </div>
    <div id="div1"></div>
    <div class="applications-images">
        <div class="container">
            <section id="photos-app">
                @foreach ($items as $item)
                <a href="{{ url('applications/' . $item->slug) }}">
                    <div class="image-a-hover">
                        <img src="{{ url($item->pic) }}" class="image-applications" alt="{{ $item->slug }}">
                        <div class="image-a-text-box">
                            <span>{!! $item->i18n_first[0]->text !!}</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </section>
        </div>
    </div>
</div>
@endsection