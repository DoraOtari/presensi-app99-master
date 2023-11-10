<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ApiDaerah extends Component
{
    public $provinsi_id;
    
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
        return view('livewire.api-daerah', [
            'provinsi' => $this->provinsi(),
            'kota' => $this->kota(),
        ]);
    }
}
