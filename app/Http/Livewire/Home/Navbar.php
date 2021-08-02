<?php

namespace App\Http\Livewire\Home;

use App\Models\Discover;
use App\Models\ExploreProduct;
use App\Models\Utils;
use Livewire\Component;

class Navbar extends Component
{
    public $logo;
    public $site_name;

    public function mount()
    {
        $utils = Utils::find(1);

        $this->logo = $utils->logo;
        $this->site_name = $utils->name_site;
    }
    public function render()
    {
        $discovers = Discover::all();
        $explores = ExploreProduct::all();
        return view('layouts.home._navbar',['discovers' => $discovers,'explores' => $explores]);
    }
}
