<?php

namespace App\Http\Livewire\Dashboard\Admim;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class UserAdd extends Component
{
    public $role;
    public $password;
    public $password_confirmation;
    public $email;
    public $name;

    public function add()
    {
        $this->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|',
            'role' => 'required|',
            'password' => 'required|confirmed'
        ]);

        $Tag =   Str::upper('#' . Str::random(3));

        $user = User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'tag'       => $Tag,
            'role_id'   =>$this->role,
            'password'  => bcrypt($this->password),
            'profile_photo_path' => '200x200.jpg',
        ]);

        if($user){
            activity()->log('Menambahkan User/Admin Baru');
            $this->flash('success', 'Selamat kamu baru saja menambahkan user baru', [
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
        return view('livewire.dashboard.admim.user-add',['roles' => $roles]);
    }
}
