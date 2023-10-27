<div>
    <div class="mb-3">
        @if ($foto)
        <div class="text-center">
                <p class="lead">Photo Preview:</p> 
                <img style="width: 100px; aspect-ratio:1/1; border-radius: 50%" src="{{ $foto->temporaryUrl() }}" >
            </div>
        @endif
        <label  class="form-label">Foto Profil</label>
        <input wire:model='foto' type="file" name="avatar"  class="form-control">
    </div>
    <button class="btn btn-primary float-end" wire:loading.attr="disabled"><i class="bi-upload" ></i> Upload</button>
</div>
