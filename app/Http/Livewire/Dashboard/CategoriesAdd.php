<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;


class CategoriesAdd extends Component
{
    public $name;
    public $parent_id;

    protected $rules = [
        'name' => 'required|max:200',
        'parent_id' => 'sometimes|nullable|numeric',
    ];

    public function render()
    {
        $categories = Category::with('subCategories')->whereNull('parent_id')->get();

        return view('livewire.dashboard.categories-add',['categories' => $categories]);
    }

    public function add()
    {
        $this->validate();

        $category = new Category();
        $category->name = $this->name;
        $category->parent_id = $this->parent_id;

        $category->slug = Str::slug($this->name);

        $category->save();

        activity()->log('Menambahkan Categories');

        $this->flash('success', 'Selamat categories berhasil di tambahkan', [
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
}
