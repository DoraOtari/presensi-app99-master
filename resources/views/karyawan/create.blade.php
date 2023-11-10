<x-template>
<div class="col-lg-8 mx-auto mt-3">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
               <i class="bi-person"></i> Karyawan
            </h4>
            <form action="{{ url('karyawan') }}" method="post">
                @csrf
                <div class="mb-3">
                  <label class="form-label">Nama Karyawan</label>
                  <input type="text" class="form-control" name="nama">
                </div>
                <livewire:nik-otomatis />
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select " name="kelamin" id="kelamin">
                                <option disabled selected>--Pilih Satu--</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="jabatan_id" class="form-label">Jabatan Karyawan</label>
                            <select class="form-select " name="jabatan_id" id="jabatan_id">
                                <option disabled selected>--Pilih Satu--</option>
                                @foreach ($jabatan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
              <livewire:api-daerah />
                
                {{-- bs5-form-textarea --}}
                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                </div>
                {{-- bs5-form-submit --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</x-template>