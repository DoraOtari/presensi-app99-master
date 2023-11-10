<?php

namespace App\Http\Livewire\Karyawan;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Create extends Component
{
    public  $tgl_lahir, $user_id, $provinsi_id;

    

   

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
