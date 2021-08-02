<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\ExploreProduct;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ExploreEdit extends Component
{
    use WithFileUploads;

    public $explore_id;

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

    // edit model
    public $new_video;
    public $new_banner_left;
    public $new_banner_right;
    public $new_denah_image;


    protected $rules = [
        'explore_title' => 'required|max:200|unique:explore_products',
        'title' => 'required|max:200',
        'subtitle' => 'nullable|max:200',
        'new_video' => 'nullable|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
        'video_link' => 'nullable|max:200',
        'new_banner_left' => 'nullable|mimes:png,jpg,svg,gif|max:20048',
        'banner_left_link' => 'required|max:200',
        'new_banner_right' => 'nullable|mimes:png,jpg,svg,gif|max:20048',
        'banner_right_link' => 'required|max:200',
        'accord_title' => 'required|max:200',
        'accord_subtitle' => 'nullable|max:200',
        'denah_title' => 'nullable|max:200',
        'denah_subtitle' => 'nullable|max:200',
        'new_denah_image' => 'nullable|mimes:png,jpg,svg,gif|max:20048',
        'lat' => 'nullable',
        'long' => 'nullable',
    ];

    public function mount()
    {
        $explore = ExploreProduct::find($this->explore_id);
        if($explore){
            $this->explore_title = $explore->explore_title;
            $this->title = $explore->title;
            $this->subtitle = $explore->subtitle;
            $this->video = $explore->video;
            $this->video_link = $explore->video_link;
            $this->banner_left = $explore->baner_1;
            $this->banner_left_link = $explore->baner_1_link;
            $this->banner_right = $explore->baner_2;
            $this->banner_right_link = $explore->baner_2_link;
            $this->accord_title = $explore->title_accord;
            $this->accord_subtitle = $explore->subtitle_accord;
            $this->denah_title = $explore->denah_title;
            $this->denah_subtitle = $explore->denah_subtitle;
            $this->denah_image = $explore->denah_image;
            $this->long = $explore->long;
            $this->lat = $explore->lat;
        }else{
            abort(404);
        }
    } 

    public function update()
    {
        $this->validate();

        $explore = ExploreProduct::find($this->explore_id);

        $explore->explore_title = $this->explore_title;
        $explore->slug = Str::slug($this->explore_title);
        $explore->title = $this->title;
        $explore->subtitle = $this->subtitle;

        if($this->new_video)
        {
            $videoName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->new_video->getClientOriginalExtension();
            $this->new_video->storeAs('public/videos', $videoName);
            $explore->video = $videoName;
        }
        $explore->video_link = $this->video_link;

        if ($this->new_banner_left) {
            # code...
            $bannerNameLeft = Carbon::now()->timestamp. '_1_' . auth()->user()->id . '.' . $this->new_banner_left->getClientOriginalExtension();
            $this->new_banner_left->storeAs('public/images', $bannerNameLeft);
            $explore->baner_1 = $bannerNameLeft;
        }
        $explore->baner_1_link = $this->banner_left_link;

        if($this->new_banner_right)
        {
            $bannerNameright = Carbon::now()->timestamp. '_2_' . auth()->user()->id . '.' . $this->new_banner_right->getClientOriginalExtension();
            $this->new_banner_right->storeAs('public/images', $bannerNameright);
            $explore->baner_2 = $bannerNameright;
        }

        $explore->baner_2_link = $this->banner_right_link;

        $explore->title_accord = $this->accord_title;
        $explore->subtitle_accord = $this->accord_subtitle;
        $explore->denah_title = $this->denah_title;
        $explore->denah_subtitle = $this->denah_subtitle;

        if($this->new_denah_image){
            $denahimageName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->new_denah_image->getClientOriginalExtension();
            $this->new_denah_image->storeAs('public/images', $denahimageName);
            $explore->denah_image = $denahimageName;
        }
        $explore->long = $this->long;
        $explore->lat = $this->lat;

        $explore->save();

        activity()->log('Mengubah Explore');

        $this->flash('success', 'Selamat Explore berhasil di Update', [
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
        return view('livewire.dashboard.explore-edit');
    }
}
