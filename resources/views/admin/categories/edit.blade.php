<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.categories.index') }}"
                   class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Show All Categories</a>
            </div>
            <div class="overflow-x-auto bg-gray-200 p-4 border-4 border-blue-400 relative">

                <form action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Category Name</label>
                        <input type="text" id="name" name="name" value="{{ $category->name }}"
                               class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-black-700 dark:border-black-600 dark:placeholder-gray-400 dark:tebg-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Enter Category Name" >
                        @error('name')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror


                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black-300" for="file_input">Upload Category Image</label>
                        <div>
                            <img class="w-32 h-32" src="{{ Storage::url($category->image) }}" alt="">
                        </div>
                        <input name="image"
                               class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-black-700 dark:border-gray-600 dark:placeholder-gray-400"
                               id="file_input" type="file">
                        @error('image')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block mb-2 text-sm font-medium text-black-900 dark:text-black-400">Category
                            Description</label>
                        <textarea id="message" rows="4" name="description"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dartext-black-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Category Description...">{{ $category->description }}</textarea>
                        @error('description')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update Category
                    </button>
                </form>

            </div>

        </div>
    </div>
</x-admin-layout>