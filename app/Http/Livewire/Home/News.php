<?php

namespace App\Http\Livewire\Home;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
// use Livewire\WithPagination;

class News extends Component
{
    // use WithPagination;

    public $search;
    public $category;

    public function render()
    {

        $categories = Category::all();
        $posts = Post::searchPost($this->search)->orderBy('id', 'desc')->paginate(5);

        return view('livewire.news',['posts' => $posts, 'categories' => $categories])->layout('layouts.home._layout');
    }
}
