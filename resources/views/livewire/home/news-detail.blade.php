<div>
    <section class="detail-news section">

        <div class="container single-col-max-width">
            <div class="images-cover w-auto mb-5">
                <img src="{{ asset('images/posts/1627282336_1.png') }}" class="img-fluid" alt="...">
            </div>

            <div class="title-post">
                <h3>{{ $title_news }}</h3>
            </div>
            <div class="post-meta-data w-auto mt-2">
                <span class="post-meta-author me-3">{{ $author_name }}</span>
                <time datetime="{{ $published_at }}">
                    <span>{{ \Carbon\Carbon::parse($published_at)->isoFormat('MMMM Do, YYYY')}}</span>
                </time>
                <span class="float-end text-uppercase">{{ $category }}</span>
            </div>

            <div class="dividen mx-auto"></div>

            <div class="post-body mb-5">
                {!! $body !!}    
            </div>
        </div>
    </section>
</div>
