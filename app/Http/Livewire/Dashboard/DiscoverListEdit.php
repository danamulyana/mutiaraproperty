<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Discover;
use App\Models\DiscoverList;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class DiscoverListEdit extends Component
{
    use WithFileUploads;

    public $discover_id;
    public $name;
    public $image;
    public $new_image;

    public $discoverList_id;

    protected $rules = [
        'name' => 'required|min:5|max:255',
        'discover_id' => 'required',
        'new_image' => 'nullable|mimes:png,jpg,svg,gif|max:20048',
    ];

    public function mount()
    {
        $discover_list = DiscoverList::find($this->discoverList_id);

        $this->name = $discover_list->name;
        $this->discover_id = $discover_list->discover_id;
        $this->image = $discover_list->image;
    }

    public function deleteimage($path)
    {
        DiscoverList::find($this->discoverList_id)->update([$path => '']);

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
        return redirect()->route('discover.edit',['discover_id' => $this->discoverList_id]);
        
    }

    public function update()
    {
        $this->validate();

        $discover_list = DiscoverList::find($this->discoverList_id);

        $discover_list->name = $this->name;
        $discover_list->discover_id = $this->discover_id;
        
        if ($this->new_image) {
            $nameImg = Carbon::now()->timestamp . '-' . auth()->user()->id . '.' . $this->new_image->getClientOriginalExtension();
            $this->new_image->storeAs('public/images/discover', $nameImg);
    
            $discover_list->image = $nameImg;
        }

        $discover_list->save();

        activity()->log('Mengubah Discover List');

        $this->flash('success', 'Selamat discover list berhasil di ubah', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  'silahkan mengubah cover', 
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

        return view('livewire.dashboard.discover-list-edit',['discovers' => $discovers]);
    }
}
