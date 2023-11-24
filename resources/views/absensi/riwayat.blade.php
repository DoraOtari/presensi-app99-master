<x-template>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto Masuk</th>
                        <th scope="col">Foto Pulang</th>
                        <th scope="col">Jam Masuk</th>
                        <th scope="col">Jam Pulang</th>
                        <th scope="col">Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kehadiran as $item)
                        <tr class="">
                            <td scope="row">{{ $loop->iteration }}.</td>
                            <td>{{ "$item->tgl/$item->bln/$item->thn" }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <img src="{{ asset('image/'.$item->foto_presensi_masuk) }}" width="45">
                            </td>
                            <td>
                                <img src="{{ asset('image/'.$item->foto_presensi_keluar) }}" width="45">
                            </td>
                            <td>{{ $item->waktu_presensi_masuk}}</td>
                            <td>{{ $item->waktu_presensi_keluar }}</td>
                            <td>{{ $item->lokasi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</x-template>