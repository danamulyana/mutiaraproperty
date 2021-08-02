<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Promo;
use Livewire\Component;
use Livewire\WithPagination;

class Promos extends Component
{
    use WithPagination;

    public function deletePromo($id)
    {
            $explore = Promo::find($id);
            $explore->delete();

            activity()->log('Menghapus Promo');

            $this->flash('success', 'Selamat promo berhasil di Hapus', [
                'position' =>  'top-end', 
                'timer' =>  3000,  
                'toast' =>  true, 
                'text' =>  '', 
                'confirmButtonText' =>  'Ok', 
                'cancelButtonText' =>  'Cancel', 
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false,
            ]);
            return redirect()->route('promos');
    }

    public function render()
    {
        $promos = Promo::paginate(10);
        return view('livewire.dashboard.promos',['promos' => $promos]);
    }
}
