@extends('layouts.front')

@section('template_title')

@endsection

@section('head')
@endsection

@section('content')
<main class="page-content" style="margin-bottom: 30px;">
    <section class="section-border text-center text-md-left">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Новини</a>
                </li>
                <li class="active">{{$news_details[0]->i18n_first[0]->text}}</li>
            </ol>
        </div>
    </section>

    <!--Start section-->
    <section class="text-center text-md-left offset-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 section-border">
                    <article class="well">
                        <h1>{{$news_details[0]->i18n_first[0]->text}}</h1>
                        <div class="blog-info">
                            <div class="pull-md-left">
                                <time datetime="{{date('Y',strtotime($news_details[0]['created_at']))}}" class="meta material-icons-schedule">
                                    {{date('M d, Y',strtotime($news_details[0]['created_at']))}}
                                </time>
                            </div>
                        </div>
                        <img src="{{url('uploads/news/'.$news_details[0]['id'].'/pic.png')}}" alt="{{$news_details[0]['slug']}}" class="pull-md-left news-details-img img-inset-1">
                        <div class="news-details-text">
                            {{$news_details[0]->i18n_first[1]->text}}
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

