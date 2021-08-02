<?php

namespace App\Http\Livewire\Home;

use App\Models\ExploreProduct;
use Livewire\Component;

class Explore extends Component
{
    public $explore_slug;

    public $title;
    public $subtitle;
    public $video;
    public $video_link;
    public $banner1;
    public $banner1_link;
    public $banner2;
    public $banner2_link;
    public $accord_title;
    public $accord_subtitle;
    // optionals
    public $denah_title;
    public $denah_subtitle;
    public $denah_image;
    public $long;
    public $lat;
    public $product;

    public $map;

    public function mount()
    {
        $explore = ExploreProduct::where('slug', $this->explore_slug)->with('product')->first();
        if($explore){
            $this->title = $explore->title;
            $this->subtitle = $explore->subtitle;
            $this->video = $explore->video;
            $this->video_link = $explore->video_link;
            $this->banner1 = $explore->baner_1;
            $this->banner1_link = $explore->baner_1_link;
            $this->banner2 = $explore->baner_2;
            $this->banner2_link = $explore->baner_2_link;
            $this->accord_title = $explore->title_accord;
            $this->accord_subtitle = $explore->subtitle_accord;
            $this->denah_title = $explore->denah_title;
            $this->denah_subtitle = $explore->denah_subtitle;
            $this->denah_image = $explore->denah_image;
            $this->long = $explore->long;
            $this->lat = $explore->lat;
            $this->map = [$explore->lat,$explore->long];
            $this->product = $explore->product;
        }
        else{
            return abort(404);
        }
    }
    public function render()
    {
        return view('livewire.home.explore')->layout('layouts.home._layout');
    }
}
