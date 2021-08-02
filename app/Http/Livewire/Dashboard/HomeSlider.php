<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\HomeSlider as ModelsHomeSlider;
use Livewire\Component;

class HomeSlider extends Component
{
    public function render()
    {
        activity()->log('Melihat Home Slider');
        $sliders = ModelsHomeSlider::all();

        return view('livewire.home-slider',['sliders' => $sliders]);
    }
}
