<?php

namespace App\Http\Livewire\Home;

use App\Models\Discover as ModelsDiscover;
use App\Models\DiscoverList;
use Livewire\Component;

class Discover extends Component
{
    public $discover_slug;
    public $discover_id;

    public $title;
    public $subtitle;
    public $title_list;
    public $subtitle_list;
    public $video;
    public $video_link;

    public function mount()
    {
        $discover = ModelsDiscover::where('slug', $this->discover_slug)->first();

        if($discover){
            $this->discover_id = $discover->id;
            $this->title = $discover->title;
            $this->subtitle = $discover->subtitle;
            $this->title_list = $discover->title_list;
            $this->subtitle_list = $discover->subtitle_list;
            $this->video = $discover->video;
            $this->video_link = $discover->video_link;
        }
        else{
            return abort(404);
        }
    }

    public function render()
    {
        $lists = DiscoverList::where('discover_id', $this->discover_id)->get();
        return view('livewire.discover',['lists' => $lists])->layout('layouts.home._layout');
    }
}
