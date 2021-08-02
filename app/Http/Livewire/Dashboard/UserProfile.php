<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;

    public $new_photo;
    public $photo;
    public $name;
    public $email;
    public $tag;
    public $role;

    public function mount()
    {
        $user = User::find(auth()->user()->id);

        $this->name = $user->name;
        $this->email = $user->email;
        $this->tag = $user->tag;
        $this->role = Role::find($user->role_id)->name;
        $this->photo = $user->profile_photo_path;
    }

    public function update()
    {
        $this->validate([
            'email' => 'required|email',
            'name' => 'required|min:3|max:255',
            'new_photo' => 'nullable|mimes:png,jpg,svg,gif|max:20048',
        ]);

        $user = User::find(auth()->user()->id);

        $user->name = $this->name;
        $user->email = $this->email;

        if($this->new_photo){
            $profile_pic_name = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->new_photo->getClientOriginalExtension();
            $this->new_photo->storeAs('public/profile/', $profile_pic_name);
            $user->profile_photo_path = $profile_pic_name;
        }

        $user->save();

        $this->flash('success', 'Selamat Accont anda berhasil di update', [
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
        return view('livewire.dashboard.user-profile');
    }
}
