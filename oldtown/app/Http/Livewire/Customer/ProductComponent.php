<?php

namespace App\Http\Livewire\Customer;

use App\Facades\Cart;
use Livewire\Component;

class ProductComponent extends Component
{
    public $menu;
    public $quantity;

    /**
     * Mounts the component on the template.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->quantity = 1;
    }

    public function render()
    {
        return view('livewire.customer.product-component', [
            'menu' => $this->menu,
        ]);
    }

     /**
     * Adds an item to cart.
     *
     * @return void
     */
    public function addToCart(): void
    {
        Cart::add($this->menu->id, $this->menu->menu_name, $this->menu->selling_price, $this->quantity);
        $this->emit('productAddedToCart');
    }
}