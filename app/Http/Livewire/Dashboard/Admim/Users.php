<?php

namespace App\Http\Livewire\Dashboard\Admim;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public function mount()
    {
        $user = auth()->user()->role_id;
        if($user !== 1)
        {
            abort(403);
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        activity()->log('Menghapus User/Admin');
        $this->flash('success', 'Selamat User berhasil di Hapus', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false,
        ]);
        return redirect()->route('user.setting');
    }

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.dashboard.admim.users',['users' => $users]);
    }
}
