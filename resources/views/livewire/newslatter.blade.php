<div>
    <form method="POST" wire:submit.prevent="submit" class="subscribe__form">
        <input type="email" placeholder="Enter email" class="subscribe__input" wire:model="email">

        <button type="submit" class="btn btn-primary">
            Subscribe
        </button>
    </form>
    @error('email') 
    <div class="row justify-content-center mt-3">
        <div class="col-6">
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    {{ $message }}
                </div>
            </div>
        </div>
    </div>
    @enderror
    @if (session()->has('success'))
        <div class="row justify-content-center mt-3">
            <div class="col-6">
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif
</div>
