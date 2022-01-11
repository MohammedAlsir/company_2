<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class ServiceSection extends Component
{
    public $services;
    public array $quantity = [];

    public function mount()
    {
        $this->services = Service::all();
        foreach ($this->services as $service) {
            $this->quantity[$service->id] = 1;
        }
    }

    public function render()
    {
        $cart = Cart::content();
        return view('livewire.service-section', compact('cart'));
    }

    public function addToCart($item_id)
    {
        $service = Service::findOrfail($item_id);
        Cart::add($service->id, $service->name, $this->quantity[$item_id], $service->price);


        // Cart::update('370d08585360f5c568b18d1f2e4ca1df', $request->quantity + 1);

        $this->emit('cart_update');
    }
}
