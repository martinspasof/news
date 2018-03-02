@extends('layouts.front')

@section('template_title')

@endsection

@section('head')
@endsection

@section('content')
    <main class="page-content">
        <section class="section-border text-center text-md-left">
            <div class="container">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">Начало</a>
                    </li>
                    <li class="active">Новини</li>
                </ol>
            </div>
        </section>

        <!--Start section-->
        <section class="text-center text-md-left offset-1 timeline main-col">
            <div class="container">
                <div class="row">

                    <div class="col-xs-11 col-md-5 col-md-offset-0 news-left">
                    @foreach($news_data as $key=>$news)
                         @if($key%2==0)
                            <article class="thumbnail well view-animate slow-hover active">
                                <a href="{{url('news/'.$news['slug'])}}">
                                    <div class="image-slow-wrapper">
                                        <img src="{{url('uploads/news/'.$news['id'].'/pic.png')}}" alt="{{$news['slug']}}">
                                    </div>
                                </a>

                                <div class="caption max-width">
                                    <h4>
                                        <a href="{{url('news/'.$news['slug'])}}">
                                            {{$news->i18n_first[0]->text}}
                                        </a>
                                    </h4>
                                    <p class="text-dark-variant-2">
                                        @php( $text = substr_replace(trim($news->i18n_first[1]->text),"...",223,strlen(trim($news->i18n_first[1]->text))))
                                        {{$text}}
                                    </p>
                                    <div class="blog-info">
                                        <div class="pull-md-left">
                                            <time datetime="{{date('Y',strtotime($news['created_at']))}}" class="meta material-icons-schedule">
                                                {{date('M d, Y',strtotime($news['created_at']))}}
                                            </time>
                                        </div>
                                        <a href="{{url('news/'.$news['slug'])}}" class="txt-bold btn-link">Прочети Повече</a>
                                    </div>
                                </div>
                            </article>
                            <div class="clearfix"></div>
                            @endif
                    @endforeach

                    </div>

                    <div class="col-xs-11 col-md-5 col-md-offset-2 inset-1 timeline-right news-right">
                        @foreach($news_data as $key=>$news)
                            @if($key%2!=0)
                                <article class="thumbnail well view-animate slow-hover active">
                                    <a href="{{url('news/'.$news['slug'])}}">
                                        <div class="image-slow-wrapper">
                                            <img src="{{url('uploads/news/'.$news['id'].'/pic.png')}}" alt="{{$news['slug']}}">
                                        </div>
                                    </a>

                                    <div class="caption max-width">
                                        <h4>
                                            <a href="{{url('news/'.$news['slug'])}}">
                                                {{$news->i18n_first[0]->text}}
                                            </a>
                                        </h4>
                                        <p class="text-dark-variant-2">
                                            @php( $text = substr_replace(trim($news->i18n_first[1]->text),"...",223,strlen(trim($news->i18n_first[1]->text))))
                                            {{$text}}
                                        </p>
                                        <div class="blog-info">
                                            <div class="pull-md-left">
                                                <time datetime="{{date('Y',strtotime($news['created_at']))}}" class="meta material-icons-schedule">
                                                    {{date('M d, Y',strtotime($news['created_at']))}}
                                                </time>
                                            </div>
                                            <a href="{{url('news/'.$news['slug'])}}" class="txt-bold btn-link">Прочети Повече</a>
                                        </div>
                                    </div>
                                </article>
                                <div class="clearfix"></div>
                            @endif
                        @endforeach

                    </div>

                    <div class="col-xs-12 text-left text-md-center offset-4">

                    </div>
                </div>
            </div>
        </section>


    </main>
@endsection

@section('footer_scripts')
@endsection