<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class NikOtomatis extends Component
{
    public $tgl_lahir, $user_id;

    public function mount($karyawan = null)
    {
        if ($karyawan != null) {
            $this->tgl_lahir = $karyawan->tgl_lahir;
            $this->user_id = $karyawan->user_id;
        }
    }
    
    public function buatNik()
    {
        $tgl = str_replace('-','',$this->tgl_lahir);
        $nik = $tgl.$this->user_id;
        return $nik;

    }
    public function render() 
    {
        return view('livewire.nik-otomatis', [
            'user' => User::all(),
            'nik'  => $this->buatNik(),
        ]);
    }
}
