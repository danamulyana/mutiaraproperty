<div>
    <section class="section">
        <div class="container d-grid justify-content-center">
          <div class="row">
            @foreach ($promos as $promo)
            <div class="py-3">
                <a href="{{ $promo->link }}" style="max-width: 100rem;">
                    <img src="{{ asset('images/promos/' . $promo->baner) }}" class="img-fluid rounded-start" alt="...">
                </a>
            </div>
            @endforeach
          </div>
          <div class="row">
            {{ $promos->links('vendor.pagination.bootstrap-4') }}
          </div>
        </div>
        
    </section>
</div>