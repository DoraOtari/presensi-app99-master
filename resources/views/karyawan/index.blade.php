<x-template>
    {{-- b:if --}}
    @if (session('pesan'))
        {{-- bs5-alert-dismissible --}}
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong><i class="bi-bell"></i></strong> {{ session('pesan') }}
        </div>
    @endif
    
    {{-- bs5-card-default --}}
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><i class="bi-karyawan"></i> Data Karyawan</h4>
            <p class="card-text">data karyawan yang telah dibuat</p>
            <a class="btn btn-primary" href="{{ url('karyawan/buat') }}"><i class="bi-plus"></i> Buat</a>
            <hr>
            {{-- bs5-table-default --}}
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Profil</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Email</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Hapus</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        {{-- b:foreach --}}
                        @foreach ($karyawan as $key => $item)
                        <tr class="">
                            @if ($item->user->foto_profil)
                            <td scope="row"><img width="40" class="rounded-circle" src='{{ asset("image/".$item->user->foto_profil) }}'></td>
                            @else
                            <td scope="row"><img class="rounded-circle" src="https://picsum.photos/id/{{ $key }}/40"></td>
                            @endif
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jabatan->nama }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href='{{ url("karyawan/$item->id") }}'>
                                    <i class="bi-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-outline-info" href='{{ url("karyawan/$item->id/edit") }}'>
                                    <i class="bi-pen"></i>
                                </a>
                            </td>
                            <td>
                                <form action='{{ url("karyawan/$item->id") }}' method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger"><i class="bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
            
        </div>
    </div>
</x-template>