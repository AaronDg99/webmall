<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartUpdateForm extends Component
{
    public $item = [];
    public $quantity = 0;

    public function mount($item)
    {
        $this->item = $item;
        $this->quantity = $item['quantity'];
    }

    public function updateCart()
    {
        Cart::session(auth()->id())->update($this->item['id'],[
            'quantity' => array(
                'relative' => false,
                'value' => $this->quantity
            )
        ]);

        $this->emit('cartUpdated', 'message', 'Cart updated');
    }

    public function render()
    {
        return view('livewire.cart-update-form');
    }
}
