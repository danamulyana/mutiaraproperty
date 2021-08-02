<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
            $explore = Product::find($id);
            $explore->delete();

            activity()->log('Menghapus Product Property');

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
        $products = Product::paginate(10);
        return view('livewire.dashboard.products',['products' => $products]);
    }
}
