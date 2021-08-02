<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class Topbar extends Component
{

    public function render()
    {
        $role = Role::find(auth()->user()->role_id);
        return view('layouts.dashboard.topbar', ['role' => $role]);
    }
}
