<?php

namespace App\Http\Livewire\Home;

use App\Models\Promo as ModelsPromo;
use Livewire\Component;

class Promo extends Component
{
    public function render()
    {
        $promos = ModelsPromo::orderBy('id','desc')->paginate(10);
        return view('livewire.home.promo',['promos' => $promos])->layout('layouts.home._layout');
    }
}
