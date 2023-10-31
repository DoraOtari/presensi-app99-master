<?php

namespace App\Http\Livewire\Karyawan;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public  $tgl_lahir, $user_id;

    public function buatNik()
    {
        $tgl = str_replace('-','',$this->tgl_lahir);
        $nik = $tgl.$this->user_id;
        return $nik;

    }

    public function render()
    {
        return view('livewire.karyawan.create', [
            'jabatan' => DB::table('jabatan')->get(),
            'user'    => User::all(),
            'nik'     => $this->buatNik(),
            ])->layout('layouts.template');
    }
}
