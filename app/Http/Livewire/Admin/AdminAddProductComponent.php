<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_des;
    public $des;
    public $regular_price;
    public $sale_price;
    public $stock;
    public $featured;
    public $qty;
    public $image;
    public $category_id;

    public function mount()
    {
        $this->stock = 'instock';
        $this->featured = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeProduct()
    {
        $product = new Product();
        $product->name              = $this->name;
        $product->slug              = $this->slug;
        $product->short_description = $this->short_des;
        $product->description       = $this->des;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->stock_status = $this->stock;
        $product->featured = $this->featured;
        $product->quantity = $this->qty;
        $imageName = Carbon::now()->timestamp. '_' .$this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('success_message', 'Product has been created successfully!');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component',['categories' => $categories])->layout('layouts.base');
    }
}
