<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\category;

class Categories extends Component
{

    public  $categories, $name, $category_id;
    public $isOpen = 0;

    protected $rules = [
        'name' => ['required','min:3'],
    ];


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
        $this->name = '';
    }

    public function store()
    {
        $this->validate();
    

        Category::updateOrCreate(['id' => $this->category_id], [
            'name' => $this->name,
        ]);
        
        session()->flash('message', 
            ($this->category_id > 0) ? __('Category Updated Successfully') : __('Category Created Successfully'));
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Category::findOrFail($id);
        $this->category_id = $id;
        $this->name = $post->name;
        $this->openModal();
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully');
    }

}
