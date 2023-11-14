<div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <select wire:model='provinsi_id' class="form-select " name="provinsi" id="provinsi">
                <option value="null" disabled selected>--Pilih Satu--</option>
                @foreach ($provinsi as $item)
                    <option value="{{ $item['id'].'/'.$item['name'] }}">{{ $item['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <select wire:model="kota_id" class="form-select " name="kota" id="kota">
                <option value="null" disabled selected>--Pilih Satu--</option>
                @foreach ($kota as $item)
                <option value="{{ $item['id'].'/'.$item['name'] }}">{{ $item['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>