<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class Homepage extends Component
{
    public function render()
    {
        $category = DB::table('categories')->get()->first();

        return view('livewire.customer.homepage', ['category' => $category]);
    }
}
