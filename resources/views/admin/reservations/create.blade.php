<x-admin-layout >
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Dashboard') }}
        </h2 >
    </x-slot >

    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="flex m-2 p-2" >
                <a href="{{ route('admin.reservations.index') }}"
                   class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white" >Show All Reservations</a >
            </div >
            <div class="overflow-x-auto bg-gray-200 p-4 border-4 border-blue-400 relative" >

                <form action="{{ route('admin.reservations.store') }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="mb-6" >
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" >
                            First Name
                        </label >
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                               class="bg-dark-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-dark-700 dark:border-gray-600 dark:placeholder-gray-400 dark:dark-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Enter First Name" >
                        @error('first_name')
                        <div class="text-sm text-red-600" >{{ $message }}</div >
                        @enderror
                    </div >

                    <div class="mb-6" >
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" >Last
                            Name</label >
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                               class="bg-dark-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-dark-700 dark:border-gray-600 dark:placeholder-gray-400 dark:dark-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Enter Last Name" >
                        @error('last_name')
                        <div class="text-sm text-red-600" >{{ $message }}</div >
                        @enderror
                    </div >

                    <div class="mb-6" >
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" >Email</label >
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                               class="bg-dark-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-dark-700 dark:border-gray-600 dark:placeholder-gray-400 dark:dark-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Enter Email" >
                        @error('email')
                        <div class="text-sm text-red-600" >{{ $message }}</div >
                        @enderror
                    </div >

                    <div class="mb-6" >
                        <label for="tel_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" >Phone
                            Number</label >
                        <input type="number" id="tel_number" name="tel_number" value="{{ old('tel_number') }}"
                               class="bg-dark-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-dark-700 dark:border-gray-600 dark:placeholder-gray-400 dark:dark-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Enter you phone number" >
                        @error('tel_number')
                        <div class="text-sm text-red-600" >{{ $message }}</div >
                        @enderror
                    </div >

                    <div class="mb-6" >
                        <label for="res_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" >Reservation
                            Date</label >
                        <input type="date" id="res_date" name="res_date" value="{{ old('res_date') }}"
                               class="bg-dark-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-dark-700 dark:border-gray-600 dark:placeholder-gray-400 dark:dark-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Enter reservation date" >
                        @error('res_date')
                        <div class="text-sm text-red-600" >{{ $message }}</div >
                        @enderror
                    </div >

                    <div class="mb-6" >
                        <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" >Guest
                            Number</label >
                        <input type="number" id="guest_number" name="guest_number" value="{{ old('guest_number') }}"
                               class="bg-dark-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-dark-700 dark:border-gray-600 dark:placeholder-gray-400 dark:dark-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Enter Guest Number" >
                        @error('guest_number')
                        <div class="text-sm text-red-600" >{{ $message }}</div >
                        @enderror
                    </div >

                    <div class="mb-6" >
                        <label for="table_id" class="block mb-2 text-sm font-medium text-black-900 dark:text-black-400 w-1/2" >Table</label >
                        <select class="w-1/2" name="table_id" id="table_id" >
                            @foreach($tables as $table)
                                <option value="{{ $table->id }}" >{{ $table->name }} ({{ $table->guest_number }}
                                    Guests)
                                </option >
                            @endforeach
                        </select >
                    </div >

                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" >
                        Add Reservation
                    </button >
                </form >

            </div >

        </div >
    </div >
</x-admin-layout >
