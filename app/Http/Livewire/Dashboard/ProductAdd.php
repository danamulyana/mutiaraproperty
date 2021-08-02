<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\ExploreProduct;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductAdd extends Component
{
    use WithFileUploads;

    public $cover_image;
    public $name;
    public $type;
    public $ukuran_propety;
    public $denah;
    public $denah2;
    public $harga;
    public $explore_id;

    public $nowa;
    public $pesanwa;

    protected $rules = [
        'cover_image' => 'required|mimes:png,jpg,svg,gif|max:20048',
        'denah' => 'required|mimes:png,jpg,svg,gif|max:20048',
        'denah2' => 'nullable|mimes:png,jpg,svg,gif|max:20048',
        'name' => 'required|max:200',
        'explore_id' => 'required',
        'type' => 'required|min:2',
        'ukuran_propety' => 'required',
        'harga' => 'required|numeric',
        'nowa' => 'required|min:9|max:15',
        'pesanwa' => 'required|max:200',
    ];

    public function add()
    {
        $this->validate();

        $product = new Product();

        $cover_imageName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->cover_image->getClientOriginalExtension();
        $this->cover_image->storeAs('public/images', $cover_imageName);
        $product->cover_image = $cover_imageName;

        $product->name = $this->name;
        $product->type = $this->type;
        $product->ukuran = $this->ukuran_propety;
        $product->harga = $this->harga;
        $product->explore_id = $this->explore_id;
        $product->no_wa = $this->nowa;
        $product->pesan_wa = urlencode($this->pesanwa);

        $denahName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->denah->getClientOriginalExtension();
        $this->denah->storeAs('public/images', $denahName);
        $product->denah = $denahName;
        
        if ($this->denah2) {
            $denah2Name = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->denah2->getClientOriginalExtension();
            $this->denah2->storeAs('public/images', $denah2Name);
            $product->denah2 = $denah2Name;
        }

        $product->save();

        activity()->log('Menambahkan Product Property');

        $this->flash('success', 'Selamat product berhasil di tambahkan', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false,
        ]);
        return redirect()->route('products');
    } 

    public function render()
    {
        $explores = ExploreProduct::all();
        return view('livewire.dashboard.product-add',['explores' => $explores]);
    }
}
