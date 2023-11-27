<?php

use App\Models\Kehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KaryawanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::view('/dashboard', 'dashboard');

Route::get('/profil', function () {
    return view('profil');
});

Route::post('profil', function(){
    $foto = request('avatar')->store('AVATARS');
    DB::table('users')->where('id', auth()->user()->id)->update(['foto_profil' => $foto]);
    return redirect('profil');
});

Route::resource('jabatan', JabatanController::class);

Route::resource('/karyawan',KaryawanController::class);

Route::post('/presensi', function (Request $req) {

    $foto64 = explode(',', $req->foto)[1];
    $namaFoto = uniqid().'.jpg';
    $lokasiFoto = 'foto absen/'.$namaFoto;
    $foto = base64_decode($foto64);
    $waktu = date('d-m-Y');
    list($tgl, $bln, $thn) = explode('-', $waktu);

    if ($req->keterangan == 'masuk') {
        Kehadiran::create(
            [
                'user_id'               => Auth::user()->id,
                'foto_presensi_masuk'   => $lokasiFoto,
                'tgl'                   => $tgl,
                'bln'                   => $bln,
                'thn'                   => $thn,
                'waktu_presensi_masuk'  => date('H.i'),
                'lokasi'                => $req->lokasi,
            ]
            );
    } else {
        $karyawan = Kehadiran::where('user_id', Auth::user()->id)->orderBy('id','desc')->first();
        $tes = Kehadiran::where('id', $karyawan->id)->where('tgl', $tgl)->update(
            [
                'foto_presensi_keluar'    => $lokasiFoto,
                'waktu_presensi_keluar'   => date('H.i'),
                
                ]
            );
            // dd($tes);
    }
    
    Storage::put($lokasiFoto, $foto);
    return redirect('/')->with('pesan', "Berhasil absen $req->keterangan");
});

Route::get('/absensi', function(){
    return view('absensi.riwayat', ['kehadiran' => Kehadiran::with('user')->get()]);
});