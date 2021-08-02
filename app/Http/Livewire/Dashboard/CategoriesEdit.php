<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoriesEdit extends Component
{
    public $name;

    public $category_id;

    protected $rules = [
        'name' => 'required|unique:categories|max:200',
        // 'parent_id' => 'sometimes|nullable|numeric',
    ];

    public function update()
    {
        $this->validate();

        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);

        $category->save();

        activity()->log('Mengubah categories');

        $this->flash('success', 'Selamat categories berhasil di ubah', [
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

    public function mount()
    {
        $category = Category::find($this->category_id);

        $this->name = $category->name;
    }

    public function render()
    {
        $categories = Category::with('subCategories')->whereNull('parent_id')->get();
        return view('livewire.dashboard.categories-edit',['categories' => $categories]);
    }
}
