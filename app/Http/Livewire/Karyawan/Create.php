<?php

namespace App\Http\Livewire\Karyawan;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Create extends Component
{
    public  $tgl_lahir, $user_id, $provinsi_id;

    public function buatNik()
    {
        $tgl = str_replace('-','',$this->tgl_lahir);
        $nik = $tgl.$this->user_id;
        return $nik;

    }

    public function provinsi()
    {
        $prov = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
        return  $prov->collect();
    }

    public function kota()
    {
        $id = explode("/",$this->provinsi_id)[0];
        return Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/regencies/'.$id.'.json')->collect();
    }

    public function render()
    {
        return view('livewire.karyawan.create', [
            'jabatan'  => DB::table('jabatan')->get(),
            'user'     => User::all(),
            'nik'      => $this->buatNik(),
            'provinsi' => $this->provinsi(),
            'kota'     => $this->kota(),
            ])->layout('layouts.template');
    }
}
