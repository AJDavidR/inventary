<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\category;

class Categories extends Component
{

    public  $categories, $nombre, $id;
    public $isOpen = 0;


    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.categories', ['categories' => $this->categories]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->nombre = '';
    }
}
