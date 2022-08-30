<x-admin-layout >
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{--            {{ __('Dashboard') }}--}}
        </h2 >
    </x-slot >

    @if ($errors->any())
        <div class="alert alert-danger" >
            <ul >
                @foreach ($errors->all() as $error)
                    <li >{{ $error }}</li >
                @endforeach
            </ul >
        </div >
    @endif

    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="flex m-2 p-2" >
                <a href="{{ route('admin.tables.index') }}"
                   class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white" >Show All Tables</a >
            </div >
            <div class="overflow-x-auto bg-gray-200 p-4 border-4 border-blue-400 relative" >
                <form action="{{ route('admin.tables.store') }}" method="POST" >
                    @csrf
                    <div class="mb-6" >
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" >Table
                            Name</label >
                        <input type="text" id="name" name="name"
                               class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-black-700 dark:border-black-600 dark:placeholder-gray-400 dark:tebg-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Enter Category Name" >
                        @error('name')
                        <div class="text-sm text-red-600" >{{ $message }}</div >
                        @enderror
                    </div >


                    <div class="mb-6" >
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black-300" for="guest_number" >Guest
                            Number</label >
                        <input type="number" id="guest_number" name="guest_number" min="0" max="10" step="1.0"
                               class="bg-black-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-black-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Enter the Guest number" >
                        @error('guest_number')
                        <div class="text-sm text-red-600" >{{ $message }}</div >
                        @enderror
                    </div >

                    <div class="mb-6" >
                        <label for="location" class="block mb-2 text-sm font-medium text-black-900 dark:text-black-400" >Location</label >
                        <select name="location" id="location" class="w-1/2" >
                            @foreach(App\Enums\TableLocation::cases() as $location)
                                <option value="{{ $location->value }}" >{{ $location->name }}</option >
                            @endforeach
                        </select >
                    </div >

                    <div class="mb-6" >
                        <label for="status" class="block mb-2 text-sm font-medium text-black-900 dark:text-black-400" >Status</label >
                        <select name="status" id="status" class="w-1/2" >
                            @foreach(App\Enums\TableStatus::cases() as $status)
                                <option value="{{ $status->value }}" >{{ $status->name }}</option >
                            @endforeach
                        </select >
                    </div >

                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" >
                        Add Table
                    </button >
                </form >


            </div >

        </div >
    </div >
</x-admin-layout >
