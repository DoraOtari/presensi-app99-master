<x-template>
    <div class="col-lg-6 mx-auto">
        <div class="card shadow-sm rounded-5">
            <div class="card-body">
                <div class="d-flex">
                    <a href="{{ url('/jabatan') }}" class="link-secondary">
                        <i class="bi-arrow-left-circle fs-3"></i>
                    </a>
                    <div class="vr mx-2"></div>
                    <h4 class="pt-2">
                        <i class="bi-pen"></i> Edit Jabatan   
                    </h4>
                </div>
                <form action="{{ url('/jabatan', $jabatan->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                      <label class="form-label">Nama Jabatan</label>
                      <input value="{{ $jabatan->nama }}" type="text" class="form-control" name="nama" placeholder="masukan nama jabatan">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Gaji Jabatan</label>
                      <input value="{{ $jabatan->gaji }}" type="number" class="form-control" name="gaji" placeholder="masukan gaji jabatan">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status">
                            <option selected>--pilih satu--</option>
                            <option @selected($jabatan->status == 'kontrak') value="kontrak">Kontrak</option>
                            <option @selected($jabatan->status == 'tetap') value="tetap">Tetap</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark rounded-pill float-end"><i class="bi-send"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-template>