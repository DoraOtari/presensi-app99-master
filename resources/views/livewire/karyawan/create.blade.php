<div class="col-lg-8 mx-auto mt-3">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
               <i class="bi-person"></i> Karyawan
            </h4>
            <form action="{{ url('karyawan') }}" method="post">
                <div class="mb-3">
                  <label class="form-label badge bg-primary">NIK</label>
                  <input value="{{ $nik }}" type="text" class=" form-control-plaintext" name="nik" readonly>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama Karyawan</label>
                  <input type="text" class="form-control" name="nama">
                </div>
                <div class="mb-3">
                  <label class="form-label">Tanggal Lahir</label>
                  <input wire:model='tgl_lahir' type="date" class="form-control" name="tgl_lahir">
                </div>
                
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
                <div class="mb-3">
                    <label for="user_id" class="form-label">Email</label>
                    <select wire:model='user_id' class="form-select " name="user_id" id="user_id">
                        <option value="null" disabled selected>--Pilih Satu--</option>
                        @foreach ($user as $item)
                        <option value="{{ $item->id }}">{{ $item->email }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
