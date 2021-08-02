<div>
    <section class="hero container">
        <h2 class="main__title">{{ $main_title }}</h2>
        <p class="hero_desc">{{ $main_subtitle }}</p>

        <div class="hero__container container d-grid justify-content-center">
            <div class="video__content">
                @if ($main_video_link)
                <iframe src="{{ $main_video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif
                @if ($main_video)
                <video id="video-file-" controls>
                    <source src="{{ asset('videos/', $main_video) }}" type="video/mp4">
                </video>
                @endif
            </div>
        </div>
    </section>

    <section class="carousel__section section">
        <h2 class="section__title">{!! $slider1_title !!}</h2>
        <p class="section_desc">{{ $slider1_subtitle }}</p>

        <div class="carausel__container container swiper-container">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slide)
                    @if ($slide->status === 'Active')
                    <div class="carausel__card swiper-slide">
                        <img src="{{ asset('sliders/'.$slide->image) }}" alt="{{ $slide->image }}" class="carausel__img">
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="carausel__pagination"></div>
            <div class="dividen mx-auto"></div>
        </div>
    </section>

    <section class="hero container">
        <h2 class="main__title">{{ $section1_title }}</h2>
        <p class="hero_desc">{{ $section1_subtitle }}</p>

        <div class="hero__container container d-grid justify-content-center">
            <div class="video__content">
                @if ($section1_video_link)
                <iframe src="https://www.youtube.com/embed/y9j-BL5ocW8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif
                @if ($section1_video)
                <video id="video-file" controls>
                    <source src="assets/videos/video.mp4" type="video/mp4">
                </video>
                @endif
            </div>
        </div>
    </section>

    @if ($section2_title || $section2_subtitle || $section2_video_link || $section2_video)
    <section class="hero container">
        <h2 class="main__title">{{ $section2_title }}</h2>
        <p class="hero_desc">{{ $section2_subtitle }}</p>

        <div class="hero__container container d-grid justify-content-center">
            <div class="video__content">
                @if ($section2_video_link)
                <iframe src="https://www.youtube.com/embed/y9j-BL5ocW8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif
                @if ($section2_video)
                <video id="video-file" controls>
                    <source src="assets/videos/video.mp4" type="video/mp4">
                </video>
                @endif
            </div>
        </div>
    </section>
    @endif

    <section class="discover section">
        <h2 class="section__title">{{ $slider2_title }}</h2>
        <p class="section_desc">{{ $slider2_subtitle }}</p>

        <div class="discover__container container swiper-container">
            <div class="swiper-wrapper">
                <!-- discover 1 -->
                @foreach ($product as $p)
                <div class="discover__card swiper-slide">
                    <img src="{{ asset('images/'.$p->cover_image) }}" alt="" class="discover__img">
                    <div class="discover__data">
                        <h2 class="discover__title">Type : {{ $p->type }}</h2>
                        <span class="discover__description">{{ "Rp " . number_format($p->harga,2,',','.'); }}</span>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>

    <!-- SUBSCRIBE -->
    <section class="subscribe section">
        <div class="subscribe__container container">
            <div class="subscribe__bg">
                <h2 class="section__title subscribe__title">{!! $news_title !!}</h2>
                <p class="subscribe__description">{{ $news_subtitle }}</p>

                <livewire:newslatter />
            </div>
        </div>
    </section>
</div>
