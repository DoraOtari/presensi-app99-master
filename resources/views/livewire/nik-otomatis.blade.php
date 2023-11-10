<div>
    <div class="mb-3">
        <label class="form-label badge bg-primary">NIK</label>
        <input value="{{ $nik }}" type="text" class=" form-control-plaintext" name="nik" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input wire:model='tgl_lahir' type="date" class="form-control" name="tgl_lahir">
      </div>
      <div class="mb-3">
        <label for="user_id" class="form-label">Email</label>
        <select wire:model='user_id' class="form-select " name="user_id" id="user_id">
            <option value="null" disabled selected>--Pilih Satu--</option>
            @foreach ($user as $item)
            <option value="{{ $item->id }}">{{ $item->email }}</option>
            @endforeach
        </select>
    </div>
</div>
