<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    public function deletecategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        activity()->log('Menghapus Categories');
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
        return redirect()->route('category');
    }
    public function render()
    {
        $categories = Category::with('subCategories')->whereNull('parent_id')->paginate(10);

        return view('livewire.dashboard.categories',['categories' => $categories]);
    }
}
