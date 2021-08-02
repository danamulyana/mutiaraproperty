<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Discover;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class DiscoverEdit extends Component
{
    use WithFileUploads;

    public $discover;
    public $title;
    public $subtitle;
    public $title_list;
    public $subtitle_list;
    public $video_link;
    public $video;
    
    public $new_video;
    public $discover_id;

    protected $rules = [
        'discover' => 'required|max:200|unique:discovers',
        'title' => 'required|max:200',
        'title_list' => 'required|max:200',
        'subtitle' => 'nullable|max:200',
        'new_video' => 'nullable|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
        'video_link' => 'nullable|min:5',
    ];

    public function mount()
    {
        $dis = Discover::find($this->discover_id);

        $this->discover = $dis->discover_title;
        $this->title = $dis->title;
        $this->subtitle = $dis->subtitle;
        $this->title_list = $dis->title_list;
        $this->subtitle_list = $dis->subtitle_list;
        $this->video_link = $dis->video_link;
        $this->video = $dis->video;
    }

    public function deleteimage($path)
    {
        Discover::find($this->discover_id)->update([$path => '']);

        activity()->log('Menghapus Images descover');

        $this->flash('success', 'Selamat discover Image berhasil di hapus', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false,
        ]);
        return redirect()->route('discoverlist.edit',['discoverList_id' => $this->discover_id]);
        
    }

    public function update()
    {
        $this->validate();

        $dis = Discover::find($this->discover_id);

        $dis->discover_title = $this->discover;
        $dis->slug = Str::slug($this->discover);
        $dis->title = $this->title;
        $dis->subtitle = $this->subtitle;
        $dis->title_list = $this->title_list;
        $dis->subtitle_list = $this->subtitle_list;

        if($this->new_video)
        {
            $videoName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->new_video->getClientOriginalExtension();
            $this->new_video->storeAs('public/videos', $videoName);
            $dis->video = $videoName;
        }
        $dis->video_link = $this->video_link;

        $dis->save();

        activity()->log('Mengubah Discover');

        $this->flash('success', 'Selamat Discover berhasil di update.', [
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
        return view('livewire.dashboard.discover-edit');
    }
}
