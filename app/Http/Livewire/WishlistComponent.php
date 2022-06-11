<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class WishlistComponent extends Component
{
    protected $listener = ['refreshcomponente' => '$refresh'];
    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component', 'refreshcomponent');
                return;
            }
        }
    }

    public function moveProductToCart($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshcomponent');
        $this->emitTo('cart-count-component', 'refreshcomponent');
    }

    public function render()
    {
        return view('livewire.wishlist-component')->layout('layouts.base');
    }
}
