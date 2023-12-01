<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Posts extends Component
{
    use WithFileUploads;


    public  $posts, $codigo, $nombre, $precio, $imagen, $category_id,  $post_id;
    public $isOpen = 0;

    protected $rules = [
        'codigo' => ['required','min:4'],
        'nombre' => ['required','min:3'],
        'precio' => ['required','min:2'],
        'imagen' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        'category_id' => ['required']
    ];

    public function render()
    {

        // $this->posts = Post::all();
        $this->posts = Post::with('category')->get();
        $Categories = Category::all();

        return view('livewire.posts', ['posts' => $this->posts, 'categories' => $Categories]);


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
        $this->codigo = '';
        $this->nombre = '';
        $this->precio = '';
        //$this->imagen = '';
        $this->category_id = '';
    }


        public function store()
        {
            // $this->validate([
            //     'codigo' => ['required'],
            //     'nombre' => ['required'],
            //     'precio' => ['required'],
            //     'imagen' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            //     'category_id' => ['required']
            // ]);
    
            $this->validate();

            $imagePath = $this->imagen->store('files', 'public');

            $imagePathWithPrefix = 'storage/' . $imagePath;
            //dd($imagePath);
            // $imagePath = $this->imagen ? $this->imagen->store(''files', 'public') : '';
            
    
            Post::updateOrCreate(['id' => $this->post_id], [
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
                'precio' => $this->precio,
                'imagen' => $imagePathWithPrefix,
                'category_id' => $this->category_id
            ]);
            
            session()->flash('message', 
                ($this->post_id > 0) ? __('Product Updated Successfully') : __('Product Created Successfully'));
            $this->closeModal();
            $this->resetInputFields();
        }



    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->codigo = $post->codigo;
        $this->nombre = $post->nombre;
        $this->precio = $post->precio;
        $this->imagen = $post->imagen;
        $this->category_id = $post->category_id;
        dd($post->all());
        $this->openModal();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully');
    }
}
