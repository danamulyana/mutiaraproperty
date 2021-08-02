<?php

namespace App\Http\Livewire\Home;

use App\Models\home as ModelsHome;
use App\Models\HomeSlider;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public $main_title;
    public $main_subtitle;
    public $main_video_link;
    public $main_video;

    public $section1_title;
    public $section1_subtitle;
    public $section1_video_link;
    public $section1_video;

    public $slider1_title;
    public $slider1_subtitle;

    public $slider2_title;
    public $slider2_subtitle;
    
    public $section2_title;
    public $section2_subtitle;
    public $section2_video_link;
    public $section2_video;

    public $news_title;
    public $news_subtitle;

    public function mount(){
        $home = ModelsHome::find(1);

        $this->main_title = $home->main_title;
        $this->main_subtitle = $home->main_subtitle;
        $this->main_video_link = $home->main_video_link;
        $this->main_video = $home->main_video;
        $this->section1_title = $home->section1_title;
        $this->section1_subtitle = $home->section1_subtitle;
        $this->section1_video_link = $home->section1_video_link;
        $this->section1_video = $home->section1_video;
        $this->slider1_title = $home->title_carausel1;
        $this->slider1_subtitle = $home->subtitle_carausel1;
        $this->section2_title = $home->section2_title;
        $this->section2_subtitle = $home->section2_subtitle;
        $this->section2_video_link = $home->section2_video_link;
        $this->section2_video = $home->section2_video;
        $this->news_title = $home->newslater_title;
        $this->news_subtitle = $home->newslater_subtitle;
        $this->updateBy = $home->update_name;

        $this->slider2_title = $home->title_carausel2;
        $this->slider2_subtitle = $home->subtitle_carausel2;
    }

    public function render()
    {
        $sliders = HomeSlider::all();
        $product = Product::all();

        return view('livewire.home',['sliders' => $sliders, 'product' => $product])->layout('layouts.home._layout');
    }
}
