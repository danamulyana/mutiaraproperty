<?php

namespace App\Http\Livewire;

use App\Models\VisitorForm;
use Livewire\Component;

class FormPengunjung extends Component
{
    public $nama;
    public $alamat;
    public $nohp;
    public $tujuan;

    public function submit()
    {

        $form = new VisitorForm();

        $form->nama = $this->nama;
        $form->alamat = $this->alamat;
        $form->nohp = $this->nohp;
        $form->tujuan = $this->tujuan;

        $form->save();
        $this->reset();
        $this->dispatchBrowserEvent('close-form');
    }

    public function render()
    {
        return view('livewire.form-pengunjung');
    }
}
