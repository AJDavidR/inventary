<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-coolgray overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-green-600 text-green-100 text-center text-lg font-bold p-2" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-5">Create New Post</button>
            @if($isOpen)
                @include('livewire.create')
            @endif
            <table class="table-fixed w-full bg-white">
                <thead  class="text-black">
                    <tr class="bg-gray-100">
                        <th class="px-8 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Codigo</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Imagen</th>
                        <th class="px-4 py-2">Categoria</th>
                        <th class="px-4 py-2">Opciones</th>

                    </tr>
                </thead>
                <tbody class="text-black text-center">
                    @foreach($posts as $post)
                    <tr>
                        
                        <td class="border px-4 py-2">{{ $post->id }}</td>
                        <td class="border px-4 py-2">{{ $post->codigo }}</td>
                        <td class="border px-4 py-2">{{ $post->nombre }}</td>
                        <td class="border px-4 py-2">{{ $post->precio }}</td>
                        <td class="border px-4 py-2"><img src="{{ asset($post->imagen) }}" alt="Imagen del post"></td>
                        <td class="border px-4 py-2">
                            @if($post->category)
                                {{ $post->category->name }}
                            @else
                                Sin categoría
                            @endif
                        </td>
                        <td class="border px-2 py-2 flex">
                        <button wire:click="edit({{ $post->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-0 rounded">Edit</button>
                        <button wire:click="delete({{ $post->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 ml-2 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>