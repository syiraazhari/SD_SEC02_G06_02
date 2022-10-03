<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;

class ShowMenus extends Component
{
    use WithPagination;

    public $term;


    public function render()
    {

        return view('livewire.show-menus', [
            'menus' => Menu::when($this->term, function($query, $term){
                return $query->where('menu_name', 'LIKE', "%$term%");
                })->paginate(5)
        ]);
    }
}
