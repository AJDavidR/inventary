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
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-5">{{ __('Create New Category') }}</button>
            @if($isOpen)
                @include('livewire.createC')
            @endif
            <table class="table-fixed w-full bg-white">
                <thead  class="text-black">
                    <tr class="bg-gray-100">
                        <th class="px-8 py-2 w-1/5">{{ __('No.') }}</th>
                        <th class="px-4 py-2 w-3/5">{{ __('Name') }}</th>
                        <th class="px-4 py-2 w-1/5">{{ __('Options') }}</th>

                    </tr>
                </thead>
                <tbody class="text-black items-center text-center">
                    @foreach($categories as $category)
                    <tr>
                        
                        <td class="border px-4 py-2">{{ $category->id }}</td>
                        <td class="border px-4 py-2">{{ $category->name }}</td>
                        <td class="border px-6 py-2 flex">
                        <button wire:click="edit({{ $category->id }})" class="max-w-24 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-0 rounded">{{ __('Edit') }}</button>
                        <button wire:click="delete({{ $category->id }})" class="max-w-24 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 ml-2 rounded">{{ __('Delete') }}</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>