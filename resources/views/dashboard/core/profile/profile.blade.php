@extends('template.dashboard-template')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Profile</h2>
    
    <div class="bg-white dark:bg-gray-800 shadow-md dark:shadow-gray-700 rounded-lg p-6 relative">
        <form action="{{ route('profile-update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex flex-col items-center mb-6">
                <div class="relative w-32 h-32">
                    <label for="profile_photo" class="cursor-pointer group">
                        @if(auth()->user()->photo_path)
                            <img src="{{ asset('storage/' . auth()->user()->photo_path) }}" alt="Profile Photo" class="w-32 h-32 rounded-full object-cover border-4 border-gray-800 dark:border-gray-600 shadow-md dark:shadow-gray-700 hover:shadow-lg dark:hover:shadow-none transition-shadow duration-300">
                        @else
                            <div class="w-32 h-32 bg-gray-200 dark:bg-gray-600 rounded-full flex items-center justify-center border-4 border-gray-800 dark:border-gray-600 shadow-md dark:shadow-gray-700 hover:shadow-lg dark:hover:shadow-none transition-shadow duration-300">
                                <img class="w-16 h-16 rounded-full cursor-pointer" src="{{ asset('img/assets/profile.png') }}" alt="Default Profile"/>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="text-white text-sm font-medium">Change Photo</span>
                        </div>
                        <input type="file" name="photo_path" id="profile_photo" class="hidden">
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="full_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="mt-1 block w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-full shadow-sm dark:shadow-gray-700 focus:border-blue-500 focus:ring-blue-500 text-gray-900 dark:text-gray-100 py-2 px-4" value="{{ auth()->user()->full_name }}" required>
            </div>

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                <input type="text" name="username" id="username" class="mt-1 block w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-full shadow-sm dark:shadow-gray-700 focus:border-blue-500 focus:ring-blue-500 text-gray-900 dark:text-gray-100 py-2 px-4" value="{{ auth()->user()->username }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-full shadow-sm dark:shadow-gray-700 focus:border-blue-500 focus:ring-blue-500 text-gray-900 dark:text-gray-100 py-2 px-4" value="{{ auth()->user()->email }}" required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
                <input type="text" name="phone_number" id="phone" class="mt-1 block w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-full shadow-sm dark:shadow-gray-700 focus:border-blue-500 focus:ring-blue-500 text-gray-900 dark:text-gray-100 py-2 px-4" value="{{ auth()->user()->phone_number }}" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                <input type="text" name="address" id="address" class="mt-1 block w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-full shadow-sm dark:shadow-gray-700 focus:border-blue-500 focus:ring-blue-500 text-gray-900 dark:text-gray-100 py-2 px-4" value="{{ auth()->user()->address }}" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors duration-300">
                    Update Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
