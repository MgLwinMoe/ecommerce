<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class AdminProductComponent extends Component
{
    use WithPagination;

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('success_message', 'Product has been deleted!');
    }

    public function render()
    {
        $products = Product::paginate(5);
        return view('livewire.admin.admin-product-component', ['products' => $products])->layout('layouts.base');
    }
}
