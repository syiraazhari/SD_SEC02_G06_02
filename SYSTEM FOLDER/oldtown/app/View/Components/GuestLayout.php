<?php

namespace App\View\Components;

use App\Facades\Cart;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    protected $total;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render(): View
    {
        $this->total = $this->totalInCart();
        return view('layouts.customerapp', [
            'total' => $this->total
        ]);
    }

    public function totalInCart()
    {
       return count(Cart::content());
    }
}