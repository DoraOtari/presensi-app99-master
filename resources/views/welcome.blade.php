@push('styleku')
    <style>
        video {
            border-radius: 25px;
            object-fit: fill;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endpush
{{-- ----- --}}
@push('scriptku')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <script language="JavaScript">
        Webcam.set({
            flip_horiz:true,
            height:200,
            width:320,
        })

		Webcam.attach( '#my_camera' );

        let tombolCapture = document.querySelector('#capture')
        var hasilFoto = document.querySelector('#hasil_foto')
        tombolCapture.onclick = function(){
            Webcam.snap(function(data){
                hasilFoto.value = data
                Webcam.freeze()
            })
        }

        let tombolReset = document.querySelector('#reset')
        tombolReset.onclick = function(){
            Webcam.unfreeze()
        }
	</script>

    {{-- map --}}
    <script>
        var map = L.map('map').setView([-2.966994, 104.748244], 18);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var circle = L.circle([-2.966994, 104.748244], {
            color: 'green',
            fillColor: 'green',
            fillOpacity: 0.5,
            radius: 30
        }).addTo(map);

        navigator.geolocation.getCurrentPosition(cekPosisi);
        function cekPosisi(posisi){
            let lokasi = document.querySelector('#lokasi')
            var lintang = posisi.coords.latitude;
            var bujur = posisi.coords.longitude;
            lokasi.value = lintang+','+bujur
            var marker = L.marker([lintang, bujur]).addTo(map);
        }

        </script>
@endpush
<x-template>
    @if (session('pesan'))
        <div class="alert alert-success" role="alert">
            <strong><i class="bi-bell"></i></strong> {{ session('pesan') }}
        </div>
    @endif
    <div class="card col-md-6 mx-md-auto border-0">
        <div class="card-body">
            <form action="{{ url('presensi') }}" method="post">
                @csrf
                <div class="mx-auto col-12" id="my_camera" ></div>
                <input type="hidden" readonly name="foto" id="hasil_foto">
                <div class="d-flex justify-content-evenly my-3">
                    <button id="reset" type="button" class="btn btn-lg btn-outline-success"><i class="bi-arrow-counterclockwise"></i></button>
                    <button id="capture" type="button" class="btn btn-lg btn-success"><i class="bi-camera-fill"></i></button>
                </div>
                <label for="" class="form-label">Keterangan</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="keterangan" checked value="masuk">
                    <label class="form-check-label" for="">Masuk</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="keterangan" value="pulang">
                    <label class="form-check-label" for="">Pulang</label>
                </div>
                <div id="map" style="height: 200px"></div>
                <input type="hidden" id="lokasi" name="lokasi" readonly>
                <section class="text-end">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </section>
            </form>
        </div>
        </div>
    </div>
</x-template>