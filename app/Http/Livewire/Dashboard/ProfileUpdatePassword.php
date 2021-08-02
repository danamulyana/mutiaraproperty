<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ProfileUpdatePassword extends Component
{
    public $role;
    public $old_password;
    public $current_password;
    public $password;
    public $password_confirmation;

   

    public function mount()
    {
        $user = User::find(auth()->user()->id);
        $this->role = Role::find($user->role_id)->name;
        $this->old_password = $user->password;
    }

    public function updateProfileInformation()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:7|confirmed'
        ]);

        if (Hash::check($this->current_password, $this->old_password)) {
            $user = User::find(auth()->user()->id);

            $user->password = bcrypt($this->password);

            $user->save();

            $this->flash('success', 'Selamat kamu baru saja mengubah password', [
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
    }

    public function render()
    {
        return view('livewire.dashboard.profile-update-password');
    }
}
