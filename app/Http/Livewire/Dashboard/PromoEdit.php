<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Promo;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class PromoEdit extends Component
{
    use WithFileUploads;

    public $baner;
    public $new_baner;
    public $link;

    public $promo_id;

    protected $rules = [
        'new_baner' => 'nullable|mimes:png,jpg,svg,gif|max:20048',
        'link' => 'required|max:200',
    ];

    public function mount()
    {
        $promo = Promo::find($this->promo_id);
        $this->baner = $promo->baner;
        $this->link = $promo->link;
    }

    public function update()
    {
        $this->validate();

        $promo = Promo::find($this->promo_id);

        if($this->new_baner){
            $banerName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->new_baner->getClientOriginalExtension();
            $this->new_baner->storeAs('public/images/promos/', $banerName);
            $promo->baner = $banerName;
        }

        $promo->link = $this->link;

        $promo->save();

        activity()->log('Mengupdate Promo');

        $this->flash('success', 'Selamat Berhasil Mengupdate Promo', [
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
        return view('livewire.dashboard.promo-edit');
    }
}
