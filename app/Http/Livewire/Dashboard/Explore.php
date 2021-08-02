<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\ExploreProduct;
use Livewire\Component;
use Livewire\WithPagination;

class Explore extends Component
{
    use WithPagination;

    public function deleteExplore($id)
    {
        $explore = ExploreProduct::find($id);
        $explore->delete();
        activity()->log('Mendelete Explore');

        $this->flash('success', 'Selamat explore berhasil di Hapus', [
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
        $explores = ExploreProduct::with('product')->paginate(5);
        return view('livewire.dashboard.explore',['explores' => $explores]);
    }
}
