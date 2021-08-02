<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Promo;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class PromoAdd extends Component
{
    use WithFileUploads;

    public $baner;
    public $link;

    protected $rules = [
        'baner' => 'required|mimes:png,jpg,svg,gif|max:20048',
        'link' => 'required|max:200',
    ];

    public function add()
    {
        $this->validate();

        $promo = new Promo();

        $banerName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->baner->getClientOriginalExtension();
        $this->baner->storeAs('public/images/promos/', $banerName);
        $promo->baner = $banerName;

        $promo->link = $this->link;

        $promo->save();

        activity()->log('Menambahkan Promo');

        $this->flash('success', 'Selamat Berhasil Menambahkan Promo', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false,
        ]);
        return redirect()->route('promos');
    }

    public function render()
    {
        return view('livewire.dashboard.promo-add');
    }
}
