<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Psr7\Request;

class CartPrice extends Component
{

    public $carts;

    public array $rowId = [];

    public function mount()
    {
        $this->carts = Cart::content();

        foreach ($this->carts as $cart) {
            $this->rowId[$cart->id] = $cart->rowId;
        }
    }

    public function render()
    {
        $servicesone = Cart::content();
        $id = 1;
        return view('livewire.cart-price', compact('servicesone', 'id'));
    }


    public function plusToCar($item_id, $qty)
    {

        // Cart::remove($this->rowId[$item_id]);
        Cart::update($this->rowId[$item_id], $qty + 1);

        // $rowId = 'lkjs';

        // Cart::update($item_id->id, 2);

        // $service = Service::findOrfail($item_id);
        // Cart::add($service->id, $service->name, 1, $service->price);

        // $this->emit('cart_update');
    }

    public function minToCar($item_id, $qty)
    {
        Cart::update($this->rowId[$item_id], $qty - 1);
        $this->emit('cart_update');
    }

    public function removeCar($item_id)
    {
        Cart::remove($this->rowId[$item_id]);
        $this->emit('cart_update');
    }
}