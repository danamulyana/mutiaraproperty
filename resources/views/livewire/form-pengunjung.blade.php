<div>
    <div class="modal fade" id="formPengunjung" tabindex="-1" aria-labelledby="formpengunjung-title" aria-hidden="true"  wire:ignore>
        <div class="modal-dialog modal-dialog-centered" wire:ignore>
            <div class="modal-content">
                <form wire:submit.prevent="submit" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="formpengunjung-title">Formulir Pengunjung</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Pengunjung" wire:model="nama" required>
                            @error('nama') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nohandphone" class="form-label">no Handphone</label>
                            <input type="tel" class="form-control" id="nohandphone" placeholder="no Handphone Pengunjung" wire:model="nohp" required>
                            @error('nohp') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tujuan" class="form-label">Tujuan Berkunjung</label>
                            <input type="text" class="form-control" id="tujuan" placeholder="Tujuan Berkunjung" wire:model="tujuan" required>
                            @error('tujuan') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" rows="3" placeholder="Alamat" wire:model="alamat" required></textarea>
                            @error('alamat') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var modal = new bootstrap.Modal(document.getElementById('formPengunjung'), {
        keyboard: false
        })
        window.addEventListener('load', () => {
            modal.show()
        })

        window.addEventListener('close-form', event => {
            modal.hide()
        })
    </script>
@endpush