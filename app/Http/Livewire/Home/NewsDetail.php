<?php

namespace App\Http\Livewire\Home;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class NewsDetail extends Component
{
    public $news_slug;

    public $title_news;
    public $id_news;
    public $body;
    public $cover_image;
    public $published_at;
    public $meta_description;

    public $author_name;
    public $category;

    public function mount()
    {
        $post = Post::where('slug', $this->news_slug)->first();

        if($post){
            $author = User::find($post->author_id);
            $categories = Category::find($post->category_id);
    
            $this->category = $categories->name;
            $this->author_name = $author->name;
            $this->title_news = $post->title;
            $this->id_news = $post->id;
            $this->body = $post->body;
            $this->cover_image = $post->cover_image;
            $this->published_at = $post->published_at;
            $this->meta_description = $post->meta_description;
        }
        else{
            return abort(404);
        }
    }
    public function render()
    {
        return view('livewire.home.news-detail')->layout('layouts.home._layout');
    }
}
