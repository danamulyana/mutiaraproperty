<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $perPage = 10;

    public function deletePost($id)
    {
        $tag = Post::find($id);
        $tag->delete();

        activity()->log('Menghapus Post News');

        $this->flash('success', 'Selamat Post berhasil di Hapus', [
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
        $posts = Post::searchPost($this->search)->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')->paginate($this->perPage); 
        return view('livewire.dashboard.posts',['posts' => $posts]);
    }
}
