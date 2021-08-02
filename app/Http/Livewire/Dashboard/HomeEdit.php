<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\home;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;


class HomeEdit extends Component
{
    use WithFileUploads;

    public $main_title;
    public $main_subtitle;
    public $main_video_link;
    public $main_video;
    public $new_main_video;

    public $section1_title;
    public $section1_subtitle;
    public $section1_video_link;
    public $section1_video;
    public $new_section1_video;

    public $slider1_title;
    public $slider1_subtitle;

    public $slider2_title;
    public $slider2_subtitle;
    
    public $section2_title;
    public $section2_subtitle;
    public $section2_video_link;
    public $section2_video;
    public $new_section2_video;

    public $news_title;
    public $news_subtitle;

    public $updateBy;

    protected $rules = [
        'main_title' => 'required|max:200',
        'new_main_video' => 'nullable|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
        'new_section1_video' => 'nullable|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
        'new_section2_video' => 'nullable|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
    ];

    public function mount(){
        $home = home::find(1);

        if($home){
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

    }

    public function update()
    {
        $home = home::find(1);

        if(!$home){
            $home = new home();
        }

        $this->validate();

        $home->main_title = $this->main_title;
        $home->main_subtitle = $this->main_subtitle;
        $home->main_video_link = $this->main_video_link;

        if($this->new_main_video){
            $main_videoName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->new_main_video->getClientOriginalExtension();
            $this->new_main_video->storeAs('public/homes',$main_videoName);
            $home->main_video = $main_videoName;
        }

        $home->section1_title = $this->section1_title;
        $home->section1_subtitle = $this->section1_subtitle;
        $home->section1_video_link = $this->section1_video_link;

        if($this->new_section1_video){
            $section1_videoName = Carbon::now()->timestamp. '_2_' . auth()->user()->id . '.' . $this->new_section1_video->getClientOriginalExtension();
            $this->new_section1_video->storeAs('public/homes', $section1_videoName);
            $home->section1_video = $section1_videoName;
        }
        $home->section2_title = $this->section2_title;
        $home->section2_subtitle = $this->section2_subtitle;
        $home->section2_video_link = $this->section2_video_link;

        if($this->new_section2_video){
            $section2_videoName = Carbon::now()->timestamp. '_3_' . auth()->user()->id . '.' . $this->new_section2_video->getClientOriginalExtension();
            $this->new_section2_video->storeAs('public/homes', $section2_videoName);
            $home->section2_video = $section2_videoName;
        }
        $home->title_carausel1 = $this->slider1_title;
        $home->subtitle_carausel1 = $this->slider1_subtitle;
        $home->title_carausel2 = $this->slider2_title;
        $home->subtitle_carausel2 = $this->slider2_subtitle;
        $home->newslater_title = $this->news_title;
        $home->newslater_subtitle = $this->news_subtitle;

        $home->update_name = auth()->user()->name . ' ' . auth()->user()->tag;                                                                           

        $home->save();

        activity()->log('Mengubah Home');

        $this->flash('success', 'Selamat Home berhasil di update', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false,
        ]);
        return redirect()->route('home.edit');
        
    }

    public function deletevideo($path)
    {
            home::find(1)->update([$path => '']);

            $this->alert('success', 'Selamat image berhasil di hapus', [
                'position' =>  'top-end', 
                'timer' =>  3000,  
                'toast' =>  true, 
                'text' =>  '', 
                'confirmButtonText' =>  'Ok', 
                'cancelButtonText' =>  'Cancel', 
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false,
            ]);
        
    }

    public function render()
    {
        return view('livewire.home-edit');
    }

   
}
