<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class PostAdd extends Component
{
    use WithFileUploads;

    public $title;
    public $cover_image;
    public $category_id;
    public $body;
    public $published_at;
    public $meta_description;

    protected $rules = [
        'cover_image' => 'required|mimes:png,jpg,svg,gif|max:20048',
        'title' => 'required|max:200|min:10',
        'category_id' => 'required',
        'body' => 'required|min:5',
        'published_at' => 'required',
        'meta_description' => 'required|min:5|max:250',
    ];

    public function add()
    {
        $this->validate();
        
        $post = new Post();

        $post->title = $this->title;
        $post->slug = Str::slug($this->title);
        $post->body = $this->body;
        $post->author_id = Auth::user()->id;
        $post->category_id = $this->category_id;
        $post->published_at = $this->published_at;
        $post->meta_description = $this->meta_description;

        if ($this->cover_image) {
            $imgName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->cover_image->getClientOriginalExtension();
            $this->cover_image->storeAs('public/images/posts',$imgName);

            $post->cover_image = $imgName;
        }

        $post->save();

        activity()->log('Menambahkan Post News');

        $this->flash('success', 'Selamat Post berhasil di tambahkan', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false,
        ]);
        return redirect()->route('posts');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.dashboard.post-add',['categories' => $categories]);
    }
}
