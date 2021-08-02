<?php

namespace App\Http\Livewire\Dashboard\Admim;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class UserEdit extends Component
{
    public $role;
    public $email;
    public $name;

    public $user_id;

    public function mount()
    {
        $user = User::find($this->user_id);

        if($user)
        {
            $this->name = $user->name;
            $this->email = $user->email;
            $this->role = $user->role_id;
        }else{
            abort(404);
        }
    }

    public function add()
    {
        $this->validate([
            'role' => 'required|',
        ]);

        $user = User::find($this->user_id);

        $user->role_id = $this->role;

        $user->save();

        if($user){
            activity()->log('MengUpdate User/Admin Baru');
            $this->flash('success', 'Selamat kamu baru saja MengUpdate user.', [
                'position' =>  'top-end', 
                'timer' =>  3000,  
                'toast' =>  true, 
                'text' =>  '', 
                'confirmButtonText' =>  'Ok', 
                'cancelButtonText' =>  'Cancel', 
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false,
            ]);
            return redirect()->route('admin.users');
        }
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.dashboard.admim.user-edit',['roles' => $roles]);
    }
}
