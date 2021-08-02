<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;


class HomeSliderEdit extends Component
{
    use WithFileUploads;

    public $img;
    public $new_img;
    public $status;
    public $insert_by;

    public $slider_id;

    public function mount($slider_id)
    {
        $slider = HomeSlider::find($slider_id);

        $this->img = $slider->image;
        $this->status = $slider->status;
        $this->insert_by = $slider->insert_by;
    }

    public function update()
    {
        $slider = HomeSlider::find($this->slider_id);

        if(!$this->img){
            $nameImg = Carbon::now()->timestamp . '-slide-' . auth()->user()->id . '.' . $this->new_img->getClientOriginalExtension();
            $this->new_img->storeAs('public/sliders', $nameImg);
            $slider->image = $nameImg;
        }

        $slider->status = $this->status;
        $slider->updated_by = auth()->user()->name . ' ' . auth()->user()->tag;

        $slider->save();

        activity()->log('Mengubah Home Slider');

        $this->flash('success', 'Selamat Slider berhasil di update', [
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

    public function deletevideo($path)
    {
        try{
            HomeSlider::find($this->slider_id)->update([$path => '']);
            
            $this->alert('success', 'selamat foto slider berhasil di hapus', [
                'position' =>  'top-end', 
                'timer' =>  3000,  
                'toast' =>  true, 
                'text' =>  '', 
                'confirmButtonText' =>  'Ok', 
                'cancelButtonText' =>  'Cancel', 
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false,
            ]);
            redirect()->back();

        }catch(\Exception $e){
            $this->alert('error', 'maaf ada kesalahan saat menghapus image.', [
                'position' =>  'top-end', 
                'timer' =>  3000,  
                'toast' =>  true, 
                'text' =>  '', 
                'confirmButtonText' =>  'Ok', 
                'cancelButtonText' =>  'Cancel', 
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false,
            ]);
            redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.home-slider-edit');
    }
}
