<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Discover;
use App\Models\DiscoverList;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class DiscoverListAdd extends Component
{
    use WithFileUploads;

    public $discover_id;
    public $name;
    public $image;

    protected $rules = [
        'name' => 'required|min:5|max:255',
        'discover_id' => 'required',
        'image' => 'required|mimes:png,jpg,svg,gif|max:20048',
    ];

    public function add()
    {
        $this->validate();

        $discover_list = new DiscoverList();

        $discover_list->name = $this->name;
        $discover_list->discover_id = $this->discover_id;
        
        $nameImg = Carbon::now()->timestamp . '-' . auth()->user()->id . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs('public/images/discover', $nameImg);

        $discover_list->image = $nameImg;

        $discover_list->save();

        activity()->log('Menambahkan Discover List');

        $this->flash('success', 'Selamat Discover List berhasil di tambahkan', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false,
        ]);
        return redirect()->route('discovers.list');
    }


    public function render()
    {
        $discovers = Discover::all();

        return view('livewire.dashboard.discover-list-add',['discovers' => $discovers]);
    }
}
