<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Discover;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class DiscoverAdd extends Component
{
    use WithFileUploads;

    public $discover_title;
    public $title;
    public $subtitle;
    public $title_list;
    public $subtitle_list;
    public $video;
    public $video_link;

    protected $rules = [
        'discover_title' => 'required|max:200|unique:discovers',
        'title' => 'required|max:200',
        'subtitle' => 'nullable|max:200',
        'title_list' => 'required|max:200',
        'subtitle' => 'nullable|max:200',
        'video' => 'nullable|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
        'video_link' => 'nullable|min:5',
    ];

    public function add()
    {
        $this->validate();

        $dis = new Discover();

        $dis->discover_title = $this->discover_title;
        $dis->slug = Str::slug($this->discover_title);
        $dis->title = $this->title;
        $dis->subtitle = $this->subtitle;
        $dis->title_list = $this->title_list;
        $dis->subtitle_list = $this->subtitle_list;

        if($this->video)
        {
            $videoName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->video->getClientOriginalExtension();
            $this->video->storeAs('public/videos', $videoName);
            $dis->video = $videoName;
        }
        $dis->video_link = $this->video_link;

        $dis->save();

        activity()->log('Menambahkan Discover');

        $this->flash('success', 'Selamat Discover berhasil di tambahkan', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false,
        ]);
        return redirect()->route('discovers');
    }

    public function render()
    {
        return view('livewire.dashboard.discover-add');
    }
}
