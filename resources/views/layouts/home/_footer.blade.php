<footer class="footer section">
    <div class="footer__container container d-grid">
        <div class="footer__content d-grid">
            <div class="footer__data">
                <div class="footer__title">
                    <img src="{{ asset('utils/'.$logo) }}" width="60%" alt="{{ $site_name }}" class="d-inline-block align-text-top">
                </div>
                <br>
                <p class="footer__description">
                    {!! $addres !!}
                </p>

            </div>

            <div class="footer__data">
                <h3 class="footer__subtitle">Navigation</h3>

                <ul>
                    <li class="footer__item">
                        <a href="" class="footer__link">Home</a>
                    </li>
                    <li class="footer__item">
                        <a href="" class="footer__link">Discover Lifestyle</a>
                    </li>
                    <li class="footer__item">
                        <a href="" class="footer__link">News & Promo</a>
                    </li>
                    <li class="footer__item">
                        <a href="" class="footer__link">Explore Product</a>
                    </li>
                </ul>
            </div>

            <div class="footer__data">
                <h3 class="footer__subtitle">Support</h3>

                <ul>
                    <li class="footer__item">
                        <p>Costumer Care : <a href="tel:{{ $no_telp }}" class="footer__link">{{ $no_telp }}</a></p>
                    </li>
                    <li class="footer__item">
                        <p>Email : <a href="mailto:{{ $email }}" class="footer__link">{{ $email }}</a></p>
                    </li>
                </ul>

                <div>
                    @if ($facebook_link)
                    <a href="{{ $facebook_link }}" target="_blank" class="footer__social">
                        <i class="ri-facebook-box-fill"></i>
                    </a>
                    @endif
                    @if ($twitter_link)
                    <a href="{{ $twitter_link }}" target="_blank" class="footer__social">
                        <i class="ri-twitter-fill"></i>
                    </a>
                    @endif
                    @if ($instagram_link)
                    <a href="{{ $instagram_link }}" target="_blank" class="footer__social">
                        <i class="ri-instagram-fill"></i>
                    </a>
                    @endif
                    @if ($Youtube_link)
                    <a href="{{ $Youtube_link }}" target="_blank" class="footer__social">
                        <i class="ri-youtube-fill"></i>
                    </a>
                    @endif
                    @if ($linked_link)
                    <a href="{{ $linked_link }}" target="_blank" class="footer__social">
                        <i class="ri-linkedin-fill"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="footer__rights">
            <p class="footer__copy">&#169; 2021 {{ $site_name }}. All rigths reserved.</p>
            <div class="footer__terms">
                <a href="" class="footer__terms-link">Terms & Agreements</a>
                <a href="" class="footer__terms-link">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>