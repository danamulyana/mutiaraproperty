<div>
    <section class="hero container">
        <h2 class="main__title">{{ $title }}</h2>
        <p class="hero_desc">{{ $subtitle }}</p>

        <div class="hero__container container d-grid justify-content-center">
            <div class="video__content">
                @if ($video_link)
                <iframe src="{{ $video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif
                @if ($video)
                <video id="video-file-" controls>
                    <source src="{{ asset('videos/', $video) }}" type="video/mp4">
                </video>
                @endif
            </div>
        </div>
    </section>
    <div class="container">
        <div class="dividen mx-auto"></div>
    </div>

    <section class="section container">
        <h2 class="section__title">{{ $title_list }}</h2>
        <p class="section_desc">{{ $subtitle_list }}</p>

        <div class="row">
            @foreach ($lists as $list)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="card mb-4">
                    <a href="#">
                      <img class="card-img" src="{{ asset('images/discover/'. $list->image) }}" alt="">
                    </a>
                    <div class="card-img-overlay d-flex justify-content-center align-items-center">
                        <h3 class="card-title text-white fw-bolder">{{ $list->name }}</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
