<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\DiscoverList as ModelsDiscoverList;
use Livewire\Component;
use Livewire\WithPagination;

class DiscoverList extends Component
{
    use WithPagination;

    public function deleteDiscover($id)
    {
        $discover = ModelsDiscoverList::find($id);
        $discover->delete();
        activity()->log('Mendelete discoverList');
        $this->flash('success', 'Selamat categories berhasil di Hapus', [
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
        $lists = ModelsDiscoverList::paginate(10);
        return view('livewire.dashboard.discover-list',['lists' => $lists]);
    }
}
