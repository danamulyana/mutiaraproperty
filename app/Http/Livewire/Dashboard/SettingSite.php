<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Utils;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingSite extends Component
{
    use WithFileUploads;

    // site model
    public $siteName;
    public $logo;
    public $new_logo;
    // public $icon;
    // public $new_icon;
    public $phone_number;
    public $address;
    public $email;

    // social model
    public $facebook_link;
    public $instagram_link;
    public $twitter_link;
    public $Youtube_link;
    public $linked_link;

    // whatsaap model
    public $whatsaap_phone;
    public $whatsaap_message;
    public $whatsaap_position;

    // rules validate
    protected $rules = [
        'siteName' => 'required|max:200',
        'new_logo' => 'nullable|mimes:png,jpg,svg,gif|max:20048',
        // 'new_icon' => 'nullable|mimes:png,jpg,svg,gif,ico|max:20048',
        'phone_number' => 'required|min:10|numeric',
        'address' => 'required|max:200',
        'email' => 'required|email',
        'facebook_link' => 'nullable|max:200',
        'instagram_link' => 'nullable|max:200',
        'twitter_link' => 'nullable|max:200',
        'Youtube_link' => 'nullable|max:200',
        'linked_link' => 'nullable|max:200',
    ];

    public function mount()
    {
        $user = auth()->user()->role_id;
        if($user !== 1)
        {
            abort(403);
        }
        
        $utils = Utils::find(1);

        if($utils){
            $this->siteName = $utils->name_site;
            $this->logo = $utils->logo;
            $this->icon = $utils->icon;
            $this->phone_number = $utils->telp_site;
            $this->address = $utils->address;
            $this->email = $utils->email_site;

            // social
            $this->facebook_link = $utils->facebook_site;
            $this->instagram_link = $utils->instagram_site;
            $this->twitter_link = $utils->twitter_site;
            $this->Youtube_link = $utils->youtube_site;
            $this->linked_link = $utils->linked_site;

            // whatsaap
            $this->whatsaap_phone = $utils->whatsapp_no;
            $this->whatsaap_message = $utils->whatsapp_message;
            $this->whatsaap_position = $utils->whatsapp_position;
        }
    }
    
    public function update()
    {
        $utils = Utils::find(1);

        if(!$utils){
            $utils = new Utils();
        }

        $this->validate();

        $utils->name_site = $this->siteName;
        $utils->telp_site = $this->phone_number;
        $utils->address = $this->address;
        $utils->email_site = $this->email;

        if($this->new_logo){
            $logoName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->new_logo->getClientOriginalExtension();
            $this->new_logo->storeAs('public/utils/', $logoName);
            $utils->logo = $logoName;
        }

        // if($this->new_icon){
        //     $iconName = Carbon::now()->timestamp. '_icon_' . auth()->user()->id . '.' . $this->new_icon->getClientOriginalExtension();
        //     $this->new_icon->storeAs('public/utils/', $iconName);
        //     $utils->icon = $iconName;
        // }

        // social
        $utils->facebook_site = $this->facebook_link;
        $utils->instagram_site = $this->instagram_link;
        $utils->twitter_site = $this->twitter_link;
        $utils->youtube_site = $this->Youtube_link;
        $utils->linked_site = $this->linked_link;

        $utils->whatsapp_no = $this->whatsaap_phone;
        $utils->whatsapp_message = $this->whatsaap_message;
        $utils->whatsapp_position = $this->whatsaap_position;

        $utils->save();

        activity()->log('Mengubah Setting Website');

        $this->flash('success', 'Selamat Website sudah di setting ulang', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false,
        ]);
        return redirect()->route('setting');
    }

    public function render()
    {
        return view('livewire.dashboard.setting-site');
    }
}
