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
        $term = '%' . $this->term . '%';
        $menus = Menu::with('category')
                                ->where('menu_name', 'LIKE', "$term")
                                ->paginate(5);
        return view('livewire.show-menus')->with('menus', $menus);
    }
}
