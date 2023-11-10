<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class NikOtomatis extends Component
{
    public $tgl_lahir, $user_id;
    
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
