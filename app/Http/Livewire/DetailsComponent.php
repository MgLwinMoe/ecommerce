<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;
use Cart;
class DetailsComponent extends Component
{
    public $slug;
    public $qty;
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to card');
        return redirect()->route('product.card');
    }

    public function increamentQty()
    {
        $this->qty++;
    }

    public function decreamentQty()
    {
        if($this->qty > 1)
        {
            $this->qty--;
        }
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popular_product = Product::inRandomOrder()->limit(4)->get();
        $related_product = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(5)->get();
        $sale = Sale::find(1);
        return view('livewire.details-component', ['product' => $product,'sale'=>$sale,'popular_product' => $popular_product, 'related_product' => $related_product])->layout('layouts.base');
    }
}
