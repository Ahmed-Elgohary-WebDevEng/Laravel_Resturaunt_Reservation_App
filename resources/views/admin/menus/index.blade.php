<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.menus.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">New Menu</a>
            </div>

            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-200 dark:text-black-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Image
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Description
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Price
                        </th>
                        <th scope="col" class="py-3 px-6">

                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $menu)
                        <tr class="bg-white border-b dark:bg-white-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-black-200 whitespace-nowrap dark:text-black">
                                {{ $menu->name }}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-black-200 whitespace-nowrap dark:text-black">
                                <img src="{!! \Illuminate\Support\Facades\Storage::url($menu->image) !!}" alt="{{ $menu->name }}" class="w-16 h-16 rounded">
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-black-200 whitespace-nowrap dark:text-black">
                                {{ $menu->description }}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-black-200 whitespace-nowrap dark:text-black">
                                {{ $menu->price }}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-black-200 whitespace-nowrap dark:text-black">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.menus.edit', $menu->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white" method="post" action="{{ route('admin.menus.destroy', $menu->id) }}" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </th>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-admin-layout>
