<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class CardComponent extends Component
{
    public function render()
    {
        return view('livewire.card-component')->layout('layouts.base');
    }
    public function increament($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component', 'refreshcomponent');
        // return redirect()->route('product.card');
    }
    public function decreament($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component', 'refreshcomponent');
        return redirect()->route('product.card');
    }

    public function remove($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshcomponent');
        session()->flash('success_message', 'Item has been removed form card');
        return redirect()->route('product.card');
    }
    public function removeAll()
    {
        Cart::instance('cart')->destory();
        session()->flash('success_message', 'All Items has been removed form card');
    }
}
