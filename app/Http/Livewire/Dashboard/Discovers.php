<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Discover;
use Livewire\Component;
use Livewire\WithPagination;

class Discovers extends Component
{
    use WithPagination;

    public function deleteDiscover($id)
    {
            $discover = Discover::find($id);
            $discover->delete();

            activity()->log('Mendelete Discover List');

            $this->flash('success', 'Selamat discover berhasil di Hapus', [
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
        $discovers = Discover::paginate(10);
        return view('livewire.dashboard.discovers',['discovers' => $discovers]);
    }
}
