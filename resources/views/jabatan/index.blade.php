<x-template>
    <div class="col-6 mx-auto mt-2">
        @if (session('notif'))
        <div class="alert alert-light alert-dismissible fade show rounded-pill" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong><i class="bi-bell"></i></strong> {{ session('notif') }}
        </div>
        @endif
        <div class="card shadow border-secondary rounded-5">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 ><i class="bi-diagram-2"></i> Data Jabatan</h4>
                    <a href="{{ url('/jabatan/create') }}" class="btn btn-light shadow-sm rounded-pill border-dark"><i class="bi-plus"></i> Create</a>
                </div>
                <table class="table mt-3 table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Gaji</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($jabatan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->status }}</td>
                            <td>Rp. {{ number_format($item->gaji,0,',','.') }}</td>
                            <td>
                                <a href="{{ url('jabatan/'.$item->id.'/edit') }}" class="btn btn-outline-primary">
                                    <i class="bi-pen"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ url('/jabatan',$item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <h3 class="text-center"><i class="bi-search"></i> Data tidak ditemukan di database</h3>
                            </td>
                        </tr>
                        @endforelse
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-template>