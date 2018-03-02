@extends('layouts.front')

@section('template_title')
    {{ $item->i18n_first[0]->text }}
@endsection

@section('head')
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.js"></script>
<div class="application-page">
    <div class="half-page">
        <div class="application-half-bg" style="background: url({{ url($item->pic) }});">
            <div  style="background: rgba(255, 188, 0, 0.7); position: absolute; width: 100%; height: 100%;">
                <div class="text-half-r-holder">
                    <h1 class="application-title">{!! $item->i18n_first[0]->text !!}</h1>
                </div>
                <div class="link-back-application">
                    <a href="{{ url('/applications')}}" class="link-a-t"><i class="fa fa-angle-left" aria-hidden="true"></i> {{ __('frontend.Всички Приложения') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="half-page">
        <div class="application-heading-text-wraper">
            <div class="grey-line"></div>
            <div class="application-heading-text">
                {!! nl2br($item->i18n_first[1]->text) !!}
            </div>
            <div class="grey-line"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    @if (!$services->isEmpty())
    <div class="services-in-application">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <div class="app-services-boxes-title">{!! __('frontend.Подходящи услуги') !!}</div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                @foreach ($services as $ser)
                <div class="col-xl-4 col-md-6">
                    <a href="{{ url('services/' . $ser->slug) }}">
                        <div class="service-box text-center sb-hover">
                            <div class="image-box-vl">
                                <img alt="creative-hub" class="img-fluid img-icon-service" data-img_name="{{ pathinfo($ser->pic, PATHINFO_FILENAME) }}" src="{{ url($ser->pic) }}">
                            </img>
                        </div>
                        <div class="text-in-s-box">
                            {!! $ser->i18n_first[0]->text !!}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@if (!$item->i18nProjects->isEmpty())
<div class="application-projects">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="text-center">
                    <div class="projects-title">{{ __('frontend.ПРОЕКТИ') }}</div>
                </div>
            </div>
        </div>
        <div class="projects-grid">
            <div class="row no-gutters">

                @if ($item->i18nProjects->count() == 1)
                <div class="col-lg-12">
                    <div class="projects-hover">
                        <img src="{{ url('/uploads/projects/' . $item->i18nProjects[0]->id . '/pic.png') }}" class="img-fluid" alt="projects">
                        <div class="projects-hover-holder">
                            <div class="projects-hover-title">
                                {!! nl2br($item->i18nProjects[0]->i18n_first[0]->text) !!}
                            </div>
                            <div class="projects-hover-text">
                                {!! nl2br($item->i18nProjects[0]->i18n_first[1]->text) !!}
                            </div>
                        </div>
                    </div>
                </div>
                @else
                @if ($item->i18nProjects->where('pic_type', 'square')->count() > 0)
                <div class="col-lg-6 square">
                    @foreach ($item->i18nProjects->where('pic_type', 'square') as $project)
                    <div class="projects-hover">
                        <img src="{{ url('/uploads/projects/' . $project->id . '/pic.png') }}" class="img-fluid" alt="projects">
                        <div class="projects-hover-holder">
                            <div class="projects-hover-title">
                                {!! nl2br($project->i18n_first[0]->text) !!}
                            </div>
                            <div class="projects-hover-text">
                                {!! nl2br($project->i18n_first[1]->text) !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                @if ($item->i18nProjects->where('pic_type', 'vert_rect')->count() > 0)
                @foreach ($item->i18nProjects->where('pic_type', 'vert_rect') as $project)
                <div class="col-lg-6 vert_rect">
                    <div class="projects-hover">
                        <img src="{{ url('/uploads/projects/' . $project->id . '/pic.png') }}" class="img-fluid" alt="projects">
                        <div class="projects-hover-holder">
                            <div class="projects-hover-title">
                                {!! nl2br($project->i18n_first[0]->text) !!}
                            </div>
                            <div class="projects-hover-text">
                                {!! nl2br($project->i18n_first[1]->text) !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                @if ($item->i18nProjects->where('pic_type', 'hor_rect')->count() > 0)
                @foreach ($item->i18nProjects->where('pic_type', 'hor_rect') as $project)
                <div class="col-lg-12 hor_rect">
                    <div class="projects-hover">
                        <img src="{{ url('/uploads/projects/' . $project->id . '/pic.png') }}" class="img-fluid" alt="projects">
                        <div class="projects-hover-holder">
                            <div class="projects-hover-title">
                                {!! nl2br($project->i18n_first[0]->text) !!}
                            </div>
                            <div class="projects-hover-text">
                                {!! nl2br($project->i18n_first[1]->text) !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endif
<div class="s-t-section-4">
    <div id="particles-js">
        <div class="container-fluid text-center text-btn-form">
            <h3>{!! __('frontend.Имаш 3D идея и търсиш партньор за реализацията й?') !!}</h3>
            <a href="#" data-toggle="modal" data-target="#inquiryModal" class="btn btn-new">{!! __('frontend.ИЗПРАТИ ЗАПИТВАНЕ'); !!}</a>
        </div>
    </div>
</div>
@if (!$item->images->isEmpty())
    <div class="gallery-section-service">
        <h3>{!! __('frontend.Галерия с проекти') !!}</h3>
        <section id="photos">
            @foreach($item->images as $img)

            <div class="gallery-img-overflow">
                    <img src="{{ url('/image/400?link=uploads/pages/' . $img->filename) }}" class="img-fluid" alt="gallery-1">
                    <div class="gallery-img-info">
                        <a data-fancybox="gallery" class="gallery-zoom-link" href="{{ url('/uploads/pages/' . $img->filename) }}"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                        @if ($img->text)
                        <a href="{{ $img->text }}" class="link-hover-tx-box" target="_blank"><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $img->text }}</a>
                        @endif
                    </div>
                </div> 
            @endforeach
        </section>
    </div>
    @endif
</div>
</div>
@endsection