@if (!$popular->isEmpty())
<div class="last-posts">
  <h2>{{ __('frontend.ПОПУЛЯРНИ ПУБЛИКАЦИИ') }}</h2>
  <div class="y-line-title"></div>
  <div class="container">
    <div class="row">
      @foreach ($popular as $k => $p)
      <div class="col-lg-4">
        <a href="{{ url('blog/' .$p->i18n_category->slug . '/' . $p->slug) }}" class="no-color-decoration">
        <div class="resources-box" style="background: url({{ url('/image/600?link=uploads/blog_posts/' . $p->id . '/pic.png') }});"></div>
          <div class="resources-box-text">
            <div class="y-subtitle">
              {!! $p->i18n_category->i18n_first[0]->text !!}
            </div>
            <div class="b-title">
              {!! $p->i18n_first[0]->text !!}
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endif