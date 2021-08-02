<div>
    <section class="section">
        <div class="container d-grid justify-content-center">
          <div class="row">
            @foreach ($posts as $post)
            <div class="card mb-3 shadow-sm" style="max-width: 100rem;" >
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset('images/posts/' . $post->cover_image) }}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <a href="{{ route('news.detail',['news_slug' => $post->slug]) }}">
                        <h3 class="card-title">{{ $post->title }}</h3>
                      </a>
                      <time datetime="{{ $post->created_at }}" class="py-2">
                        <i class="bi bi-calendar-event"></i> {{ $post->created_at->diffForHumans() }}
                      </time>
                      <p class="card-text pt-2">
                        {!! Str::limit(($post->body), 150, '...') !!}
                      </p>
                      <a href="{{ route('news.detail',['news_slug' => $post->slug]) }}" class="btn btn-primary">read more</a>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
          </div>
          <div class="row">
            {{ $posts->links('vendor.pagination.bootstrap-4') }}
          </div>
        </div>
        
    </section>
</div>

@push('scripts')
<script src="/js/choices.js"></script>
  <script>
    const choices = new Choices('[data-trigger]',
    {
      searchEnabled: false,
      itemSelectText: '',
    });
  </script>
@endpush