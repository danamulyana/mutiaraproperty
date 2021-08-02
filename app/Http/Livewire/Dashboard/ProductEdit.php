<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\ExploreProduct;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
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
    public $product_id;

    // update
    public $new_cover_image;
    public $new_denah;
    public $new_denah2;

    public $nowa;
    public $pesanwa;

    protected $rules = [
        'new_cover_image' => 'nullable|mimes:png,jpg,svg,gif|max:20048',
        'new_denah' => 'nullable|mimes:png,jpg,svg,gif|max:20048',
        'new_denah2' => 'nullable|mimes:png,jpg,svg,gif|max:20048',
        'name' => 'required|max:200',
        'explore_id' => 'required',
        'type' => 'required|min:2',
        'ukuran_propety' => 'required',
        'harga' => 'required|numeric',
        'nowa' => 'required|min:9|max:15',
        'pesanwa' => 'required|max:200',
    ];

    public function mount()
    {
        $product =  Product::find($this->product_id);

        if($product){
            $this->cover_image = $product->cover_image;
            $this->name = $product->name;
            $this->type = $product->type;
            $this->ukuran_propety = $product->ukuran;
            $this->denah = $product->denah;
            $this->denah2 = $product->denah2;
            $this->harga = $product->harga;
            $this->explore_id = $product->explore_id;
            $this->nowa = $product->no_wa;
            $this->pesanwa = urldecode($product->pesan_wa);
        }else{
            abort(404);
        }
    }

    public function update()
    {
        $this->validate();

        $product =  Product::find($this->product_id);

        if($this->new_cover_image){
            $cover_imageName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->new_cover_image->getClientOriginalExtension();
            $this->new_cover_image->storeAs('public/images', $cover_imageName);
            $product->cover_image = $cover_imageName;
        }

        $product->name = $this->name;
        $product->type = $this->type;
        $product->ukuran = $this->ukuran_propety;
        $product->harga = $this->harga;
        $product->explore_id = $this->explore_id;
        $product->no_wa = $this->nowa;
        $product->pesan_wa = urlencode($this->pesanwa);

        if($this->new_denah)
        {
            $denahName = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->new_denah->getClientOriginalExtension();
            $this->new_denah->storeAs('public/images', $denahName);
            $product->denah = $denahName;
        }
        
        if ($this->new_denah2) {
            $denah2Name = Carbon::now()->timestamp. '_' . auth()->user()->id . '.' . $this->new_denah2->getClientOriginalExtension();
            $this->new_denah2->storeAs('public/images', $denah2Name);
            $product->denah2 = $denah2Name;
        }

        $product->save();

        activity()->log('Mengubah Product Property');

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
        return view('livewire.dashboard.product-edit',['explores' => $explores]);
    }
}
