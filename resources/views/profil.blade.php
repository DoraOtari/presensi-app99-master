<x-template>
    <div class="col-lg-6 mx-auto mt-3">
        <div class="card">
            <div class="card-body">
                <h4><i class="bi-image"></i> Upload Foto Profil</h4>
                <hr>
                <form action="{{ url('profil') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <livewire:upload-file />
                </form>
            </div>
        </div>
    </div>
</x-template>