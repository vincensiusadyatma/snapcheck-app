@extends('template.dashboard-template')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Profile</h2>
    
    <div class="bg-white shadow-md rounded-lg p-6 relative">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex flex-col items-center mb-6">
                <div class="relative w-32 h-32">
                    <label for="profile_photo" class="cursor-pointer">
                        @if(auth()->user()->profile_photo)
                            <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="Profile Photo" class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-md hover:shadow-lg transition-shadow duration-300">
                        @else
                            <div class="w-32 h-32 bg-gray-200 rounded-full flex items-center justify-center border-4 border-white shadow-md hover:shadow-lg transition-shadow duration-300">
                                <span class="text-gray-500">Upload Photo</span>
                            </div>
                        @endif
                        <input type="file" name="profile_photo" id="profile_photo" class="hidden">
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ auth()->user()->full_name }}" required>
            </div>

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ auth()->user()->username }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ auth()->user()->email }}" required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone" id="phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ auth()->user()->phone }}" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" id="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ auth()->user()->address }}" required>
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
