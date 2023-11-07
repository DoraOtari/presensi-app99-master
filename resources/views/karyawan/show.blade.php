<x-template>
<div class="col-6 mx-auto">
    {{-- bs5-card-default --}}
   <div class="card">
    <div class="card-body">
        <h4 class="card-title">Detail Karyawan</h4>
        <hr>
        <table class="table">
            <tr>
                <td colspan="3">
                    <img src="{{ asset('image/'.$karyawan->user->foto_profil) }}" width="55" class="rounded-5">
                </td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>:</td>
                <td>{{ $karyawan->nama }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>:</td>
                <td>{{ $karyawan->nik }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>:</td>
                <td>{{ $karyawan->user->email }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>:</td>
                <td>{{ $karyawan->kelamin = 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>:</td>
                <td>{{ date('d-m-Y', strtotime($karyawan->tgl_lahir))  }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>:</td>
                <td>{{ explode('/',$karyawan->provinsi)[1].', '.explode('/',$karyawan->kota)[1].', '.$karyawan->alamat }}</td>
            </tr>
        </table>
    </div>
   </div> 
</div>
</x-template>