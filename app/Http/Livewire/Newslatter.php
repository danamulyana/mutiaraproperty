<?php

namespace App\Http\Livewire;

use App\Actions\Newslatter\EmailSubscriberAction;
use App\Mail\SubsriberMailable;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Spatie\Newsletter\NewsletterFacade;

class Newslatter extends Component
{
    public string $email = '';

    protected $rules = [
        'email' => 'required|email|unique:subscribers'
    ];

    public function submit()
    {
        $this->validate();

        $token = bcrypt($this->email);

        $data = array(
            'email' => $this->email,
        );

        (new EmailSubscriberAction)([
            'email' => $this->email,
            'token' => $token,
        ]);

        if(!NewsletterFacade::isSubscribed($this->email)){
            NewsletterFacade::subscribe($this->email,['TOKEN' => $token]);
        }

        Mail::to($this->email)
            ->bcc('Youremail@mail.com')
            ->send(new SubsriberMailable($data));

        session()->flash('success','you are subscribe');

        $this->reset();
    } 

    

    public function render()
    {
        return view('livewire.newslatter');
    }
}
