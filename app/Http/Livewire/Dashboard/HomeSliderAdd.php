<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class HomeSliderAdd extends Component
{
    use WithFileUploads;

    public $img;
    public $status = 'Inactive';

    protected $rules = [
        'img' => 'required|mimes:png,jpg,svg,gif|max:20048',
    ];

    public function add()
    {
        $this->validate();

        $slider = new HomeSlider();
        
        $nameImg = Carbon::now()->timestamp . '-slide-' . auth()->user()->id . '.' . $this->img->getClientOriginalExtension();
        $this->img->storeAs('public/sliders', $nameImg);

        $slider->image = $nameImg;
        $slider->status = $this->status;
        $slider->insert_by = auth()->user()->name . ' ' . auth()->user()->tag;

        $slider->save();

        activity()->log('Menambahkan Home Slider');

        $this->flash('success', 'Selamat Slider berhasil di Tambahkan.', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false,
        ]);
        return redirect()->route('home.slider');
    }

    public function render()
    {
        return view('livewire.home-slider-add');
    }
}
