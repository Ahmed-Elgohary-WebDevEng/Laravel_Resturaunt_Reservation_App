<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index') }}"
                   class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Show All Menus</a>
            </div>
            <div class="overflow-x-auto bg-gray-200 p-4 border-4 border-blue-400 relative">

                <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Menu Name</label>
                        <input type="text" id="name" name="name" value="{{ $menu->name }}"
                               class="bg-dark-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-dark-700 dark:border-gray-600 dark:placeholder-gray-400 dark:dark-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Food Menu.." required="">
                        @error('name')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black-300" for="file_input">Upload Menu Image</label>
                        <img class="w-32 h-32" src="{{ Storage::url($menu->image) }}" alt="">
                        <input name="image"
                               class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-black-700 dark:border-gray-600 dark:placeholder-gray-400"
                               id="file_input" type="file">
                        @error('image')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Menu Price</label>
                        <input type="number" id="price" name="price" min="0.00" max="10000.00" step="0.01" value="{{ $menu->price }}"
                               class="bg-black-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-black-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Enter the menu price" required="">
                        @error('price')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block mb-2 text-sm font-medium text-black-900 dark:text-black-400">Menu Description</label>
                        <textarea id="description" rows="4" name="description"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-black-700 dark:border-gray-600 dark:placeholder-gray-400 dark:black-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Your description...">{{ $menu->description }}</textarea>
                        @error('description')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="categories" class="block mb-2 text-sm font-medium text-black-900 dark:text-black-400">Categories</label>
                        <select name="categories[]" id="categories" multiple >
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected($menu->categories->contains($category))>{{ $category->name }}</option>

                            @endforeach
                        </select>
                    </div>

                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update Menu
                    </button>
                </form>

            </div>

        </div>
    </div>
</x-admin-layout>
