<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $product_slug;
    public $short_des;
    public $des;
    public $regular_price;
    public $sale_price;
    public $stock;
    public $featured;
    public $qty;
    public $image;
    public $product_id;
    public $category_id;
    public $newImage;

    public function mount($product_slug)
    {
        $product = Product::where('slug', $this->product_slug)->first();

        $this->product_slug = $product->slug;
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->product_slug = $product->slug;
        $this->short_des = $product->short_description;
        $this->des = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->stock = $product->stock_status;
        $this->featured = $product->featured;
        $this->qty = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function update()
    {
        $product = Product::find($this->product_id);
        $product->name              = $this->name;
        $product->slug              = $this->slug;
        $product->short_description = $this->short_des;
        $product->description       = $this->des;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->stock_status = $this->stock;
        $product->featured = $this->featured;
        $product->quantity = $this->qty;
        if($this->newImage)
        {
            $imageName = Carbon::now()->timestamp. '_' .$this->newImage->extension();
            $this->newImage->storeAs('products', $imageName);
            $product->image = $imageName;
        }
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('success_message', 'Product has been updated successfully!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component',['categories' => $categories])->layout('layouts.base');
    }
}
