<?php

namespace App\Http\Livewire\Home;

use App\Models\Utils;
use Livewire\Component;

class Footer extends Component
{
    public $logo;
    public $site_name;
    public $addres;
    public $no_telp;
    public $email;

    public $facebook_link;
    public $instagram_link;
    public $twitter_link;
    public $Youtube_link;
    public $linked_link;

    public function mount()
    {
        $utils = Utils::find(1);

        $this->logo = $utils->logo;
        $this->site_name = $utils->name_site;
        $this->addres = $utils->address;
        $this->no_telp = $utils->telp_site;
        $this->email = $utils->email_site;

        $this->facebook_link = $utils->facebook_site;
        $this->instagram_link = $utils->instagram_site;
        $this->twitter_link = $utils->twitter_site;
        $this->Youtube_link = $utils->youtube_site;
        $this->linked_link = $utils->linked_site;
    }

    public function render()
    {
        return view('layouts.home.._footer');
    }
}
