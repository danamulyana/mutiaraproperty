<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\ExploreProduct;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ExploreAdd extends Component
{
    use WithFileUploads;

    public $explore_title;
    public $title;
    public $subtitle;
    public $video;
    public $video_link;
    public $banner_left;
    public $banner_left_link;
    public $banner_right;
    public $banner_right_link;
    public $accord_title;
    public $accord_subtitle;
    // optionals
    public $denah_title;
    public $denah_subtitle;
    public $denah_image;
    public $long;
    public $lat;

    protected $rules = [
        'explore_title' => 'required|max:200|unique:explore_products',
        'title' => 'required|max:200',
        'subtitle' => 'nullable|max:200',
        'video' => 'nullable|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
        'video_link' => 'nullable|max:200',
        'banner_left' => 'required|mimes:png,jpg,svg,gif|max:20048',
        'banner_left_link' => 'required|max:200',
        'banner_right' => 'required|mimes:png,jpg,svg,gif|max:20048',
        'banner_right_link' => 'required|max:200',
        'accord_title' => 'required|max:200',
        'accord_subtitle' => 'nullable|max:200',
        'denah_title' => 'nullable|max:200',
        'denah_subtitle' => 'nullable|max:200',
        'denah_image' => 'nullable|mimes:png,jpg,svg,gif|max:20048',
        'lat' => 'nullable',
        'long' => 'nullable'
    ];

    public function add()
    {
        $this->validate();

        $explore = new ExploreProduct();

        $explore->explore_title = $this->explore_title;
        $explore->slug = Str::slug($this->explore_title);
        $explore->title = $this->title;
        $explore->subtitle = $this->subtitle;

        if($this->video)
        {
            $videoName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->video->getClientOriginalExtension();
            $this->video->storeAs('public/videos', $videoName);
            $explore->video = $videoName;
        }
        $explore->video_link = $this->video_link;

        $bannerNameLeft = Carbon::now()->timestamp. '_1_' . auth()->user()->id . '.' . $this->banner_left->getClientOriginalExtension();
        $this->banner_left->storeAs('public/images', $bannerNameLeft);
        $explore->baner_1 = $bannerNameLeft;

        $explore->baner_1_link = $this->banner_left_link;

        $bannerNameright = Carbon::now()->timestamp. '_2_' . auth()->user()->id . '.' . $this->banner_right->getClientOriginalExtension();
        $this->banner_right->storeAs('public/images', $bannerNameright);
        $explore->baner_2 = $bannerNameright;

        $explore->baner_2_link = $this->banner_right_link;

        $explore->title_accord = $this->accord_title;
        $explore->subtitle_accord = $this->accord_subtitle;
        $explore->denah_title = $this->denah_title;
        $explore->denah_subtitle = $this->denah_subtitle;

        if($this->denah_image){
            $denahimageName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->denah_image->getClientOriginalExtension();
            $this->denah_image->storeAs('public/images', $denahimageName);
            $explore->denah_image = $denahimageName;
        }
        $explore->long = $this->long;
        $explore->lat = $this->lat;

        $explore->save();

        activity()->log('Menambahkan Explore');

        $this->flash('success', 'Selamat Explore berhasil di tambahkan', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false,
        ]);
        return redirect()->route('explores');
    }

    public function render()
    {
        return view('livewire.dashboard.explore-add');
    }
}
