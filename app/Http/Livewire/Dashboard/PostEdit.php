<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    use WithFileUploads;

    public $post_id;

    public $title;
    public $cover_image;
    public $New_cover_image;
    public $category_id;
    public $body;
    public $published_at;
    public $meta_description;

    protected $rules = [
        'New_cover_image' => 'mimes:png,jpg,svg,gif|max:20048',
        'title' => 'required|max:200|min:10',
        'category_id' => 'required',
        'body' => 'required|min:5',
        'published_at' => 'required',
        'meta_description' => 'required|min:5|max:250',
    ];

    public function mount()
    {
        $post  = Post::find($this->post_id);

        $this->title = $post->title;
        $this->cover_image =  $post->cover_image;
        $this->category_id =  $post->category_id;
        $this->body = $post->body;
        $this->published_at = $post->published_at;
        $this->meta_description = $post->meta_description;
    }

    public function update()
    {
        $post  = Post::find($this->post_id);

        $this->validate();

        $post->title = $this->title;
        $post->slug = Str::slug($this->title);
        $post->body = $this->body;
        $post->author_id = Auth::user()->id;
        $post->category_id = $this->category_id;
        $post->published_at = $this->published_at;
        $post->meta_description = $this->meta_description;

        if($this->New_cover_image){
            $imgName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->New_cover_image->getClientOriginalExtension();
            $this->New_cover_image->storeAs('public/images/posts',$imgName);

            $post->cover_image = $imgName;
        }

        $post->save();

        activity()->log('Mengubah Post News');

        $this->flash('success', 'Selamat Post berhasil di ubah', [
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

    public function deletevideo($path)
    {
        Post::find($this->post_id)->update([$path => '']);

        $this->flash('success', 'Selamat Post Image berhasil di hapus', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  'silahkan mengubah cover', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false,
        ]);
        return redirect()->back();
        
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.dashboard.post-edit',['categories' => $categories]);
    }
}
