<header class="header">
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <div class="container ">
          <a class="navbar-brand" href="{{ route('home') }}">
              <img src="{{ asset('utils/'.$logo) }}" alt="{{ $site_name }}" class="d-inline-block align-text-top">
          </a>
          <div class="nav-toggle d-block d-lg-none" id="nav-toggle">
              <i class="ri-menu-line"></i>
          </div>
          <div class="dividen d-none d-lg-block"></div>
          <div class="nav-menu d-lg-block" id="nav-menu">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{ route('home') }}">HOME</a>
                {{-- <a class="nav-link active" aria-current="page" href="{{ route('home') }}">HOME</a> --}}
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="nav-discover" role="button" data-bs-toggle="dropdown" aria-expanded="false">DISCOVER LIFESTYLE</a>
                <ul class="dropdown-menu" aria-labelledby="nav-discover-dropdown-MenuLink">
                    @foreach ($discovers as $discover)
                    <li><a class="dropdown-item text-uppercase" href="{{ route('discover',['discover_slug' => $discover->slug]) }}">{{ $discover->discover_title }}</a></li>
                    @endforeach
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link  dropdown-toggle"  id="nav-news-promo" role="button" data-bs-toggle="dropdown" aria-expanded="false">NEWS & PROMO</a>
                <ul class="dropdown-menu" aria-labelledby="nav-news-promo-dropdown-MenuLink">
                  <li><a class="dropdown-item" href="{{ route('news') }}">NEWS</a></li>
                  <li><a class="dropdown-item" href="{{ route('promo') }}">PROMO</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="nav-explore" role="button" data-bs-toggle="dropdown" aria-expanded="false">EXPLORE PRODUCT</a>
                <ul class="dropdown-menu" aria-labelledby="nav-explore-dropdown-MenuLink">
                  @foreach ($explores as $explore)
                  <li><a class="dropdown-item text-uppercase" href="{{ route('explore-product',['explore_slug' => $explore->slug]) }}">{{ $explore->explore_title }}</a></li>
                  @endforeach
                </ul>
              </li>
            </ul>
            <i class="ri-close-line nav-close d-block d-lg-none" id="nav-close"></i>
          </div>
        </div>
    </nav>
    <div>
        <div class="container">
            <div class="dividen mx-auto"></div>
        </div>
    </div>
</header>