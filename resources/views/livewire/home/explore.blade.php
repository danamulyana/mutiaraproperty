@push('styles')
    <link rel="stylesheet" href="/css/accord.css">
    @bukStyles(true)
@endpush
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

        <div class="col-12">
            <div class="d-md-flex">
                <div class="col-md-6">
                    <a href="{{ $banner1_link }}">
                        <img src="{{ asset('images/'.$banner1) }}" alt="{{ $banner1_link }}" class="img-responsive">
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ $banner2_link }}">
                        <img src="{{ asset('images/'.$banner2) }}" alt="{{ $banner2_link }}" class="img-responsive">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <div class="dividen mx-auto"></div>
    </div>

    <section class="section container">
        <h2 class="main__title">{{ $accord_title }}</h2>
        <p class="hero_desc">{{ $accord_subtitle }}</p>

        <div class="container-fluid">
            @foreach ($product as $p)
            <div class="accordion">
                <div class="icon">
                    <i class="ri-add-fill"></i>
                </div>
                <h5 class="acoord-title">{{  $p->name }}</h5>
            </div>
            <div class="panel">
                <div class="p-4">
                    <h3>Type : {{ $p->type }}</h3>
                    <h3>Ukuran : {{ $p->ukuran }}</h3>
                    <h3>Harga : @currency($p->harga)</h3>
                    <img class="pt-3" src="{{ asset('images/'.$p->denah) }}" alt="{{  $p->name }}">
                    @if ($p->denah2)
                    <div class="pt-3">
                        <img src="{{  asset('images/'.$p->denah2) }}" alt="{{  $p->name }}">
                    </div>
                    @endif
                    <div class="d-grid gap-2 py-4">
                        <a href="https://api.whatsapp.com/send?phone={{ $p->no_wa }}&text={{ $p->pesan_wa }}" class="btn btn-success" type="button"><i class="bi bi-whatsapp"></i> Pesan sekarang juga</a>
                    </div>
                </div>
            </div>    
            @endforeach
        </div>
    </section>

    @if ($denah_title)
    <section class="section container">
        <h2 class="main__title">{{ $denah_title }}</h2>
        <p class="hero_desc">{{ $denah_subtitle }}</p>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if ($denah_image)
                    <img src="{{ asset('images/'.$denah_image) }}" alt="{{ $denah_title }}" class="img-responsive">
                    @endif
                    @if ($lat && $long)
                    {{-- <x-mapbox :options="['zoom' => 8]" :markers="" style='width: 100%; height: 500px;' /> --}}
                    <div id='map' style='width: 100%; height: 500px;'></div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif
</div>

@push('scripts')
    <script src="/js/accord.js"></script>
    @bukScripts(true)
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZGFuYW11bHlhbmEiLCJhIjoiY2txczQ4c2JoMjNmZjJ1bW1mMzJzbXFzNSJ9.QEQkapQIKY4R3T0geu7UjQ';
        var map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v11', // style URL
            center: [{{ $long }}, {{ $lat }}], // starting position [lng, lat]
            zoom: 15 // starting zoom
        });
        var marker = new mapboxgl.Marker()
            .setLngLat([{{ $long }}, {{ $lat }}])
            .addTo(map);
    </script>
@endpush
