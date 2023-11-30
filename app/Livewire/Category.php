<?php

namespace App\Livewire;

use Livewire\Component;

class Category extends Component
{

    public  $categories, $nombre, $id;
    public $isOpen = 0;


    public function render()
    {
        $this->categories = Categories::all();
        return view('livewire.categories', ['categories' => $this->Categories]);
    }

}
