@extends('template.dashboard-template')

@section('content')
<div class="head-title flex items-center justify-between">
    <div class="left">
        <h1 class="text-gray-900 dark:text-gray-100">Rooms Dashboard</h1>
        <ul class="breadcrumb">
            <li><a href="#" class="text-gray-700 dark:text-gray-300">Dashboard</a></li>
            <li><i class='bx bx-chevron-right text-gray-400 dark:text-gray-500'></i></li>
            <li><a class="active text-blue-500 dark:text-blue-400" href="#">Rooms</a></li>
        </ul>
    </div>
    <!-- Room Counts -->
    <div class="mt-4 flex justify-end space-x-4">
        <div class="bg-blue-500 text-white py-2 px-4 rounded dark:bg-blue-600">
            <h2 class="text-xl font-semibold">My Rooms</h2>
            <p class="text-lg">{{ $myRoomsCount }}</p>
        </div>
        <div class="bg-green-500 text-white py-2 px-4 rounded dark:bg-green-600">
            <h2 class="text-xl font-semibold">Joined Rooms</h2>
            <p class="text-lg">{{ $joinedRoomsCount }}</p>
        </div>
    </div>
</div>

<!-- Mini Navbar -->
<div class="flex space-x-4 mt-4">
    <a href="{{ route('show-myrooms') }}" class="btn-nav bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700">
        My Rooms
    </a>
    <a href="{{ route('show-joinedrooms') }}" class="btn-nav bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700">
        Joined Rooms
    </a>
</div>

<!-- Latest My Rooms -->
<div class="mt-6">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Latest My Rooms</h2>
    <div class="rooms-list mt-4 flex flex-wrap">
        @forelse($myRooms as $room)
            <!-- Card -->
            <a href="{{ route('show-myrooms-details', ['room' => $room->id]) }}" 
               class="relative bg-white dark:bg-gray-800 py-6 px-6 rounded-3xl w-full sm:w-64 md:w-1/4 lg:w-1/4 my-6 mx-2 shadow-xl transform transition-transform duration-300 ease-in-out hover:scale-105">
                <div class="text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-pink-500 left-4 -top-6 dark:bg-pink-600">
                    <!-- SVG Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="mt-8">
                    <p class="text-xl font-semibold my-2 text-gray-900 dark:text-gray-100">{{ $room->name }}</p>
                    <div class="flex space-x-2 text-gray-400 dark:text-gray-400 text-sm">
                        <p>{{ $room->description }}</p>
                    </div>
                    <div class="border-t-2 border-gray-200 dark:border-gray-600 mt-10"></div>
                    <div class="flex justify-between">
                        <div class="my-2">
                            <p class="font-semibold text-base mb-2 text-gray-900 dark:text-gray-100">Team Member</p>
                            <div class="flex space-x-2">
                                @forelse ($room->enrollRoom()->latest()->take(4)->get() as $enrollment)
                                @if($enrollment->user)
                                    <img src="{{ asset('storage/' . $enrollment->user->photo_path) }}" 
                                    class="w-6 h-6 rounded-full"/>
                                @endif
                                @empty
                                    <p class="text-gray-400 dark:text-gray-500">No members yet</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <p class="text-gray-700 dark:text-gray-300">No rooms found.</p>
        @endforelse
    </div>
</div>

<!-- Latest Joined Rooms -->
<div class="mt-6">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Latest Joined Rooms</h2>
    <div class="rooms-list mt-4 flex flex-wrap">
        @forelse($joinedRooms as $room)
            <!-- Card -->
            <a href="{{ route('show-joinedrooms-details', ['room' => $room->id]) }}" 
               class="relative bg-white dark:bg-gray-800 py-6 px-6 rounded-3xl w-full sm:w-64 md:w-1/4 lg:w-1/4 my-6 mx-2 shadow-xl transform transition-transform duration-300 ease-in-out hover:scale-105">
                <div class="text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6 dark:bg-blue-600">
                    <!-- SVG Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="mt-8">
                    <p class="text-xl font-semibold my-2 text-gray-900 dark:text-gray-100">{{ $room->name }}</p>
                    <div class="flex space-x-2 text-gray-400 dark:text-gray-400 text-sm">
                        <p>{{ $room->description }}</p>
                    </div>
                    <div class="border-t-2 border-gray-200 dark:border-gray-600 mt-10"></div>
                    <div class="flex justify-between">
                        <div class="my-2">
                            <p class="font-semibold text-base mb-2 text-gray-900 dark:text-gray-100">Team Member</p>
                            <div class="flex space-x-2">
                                @forelse ($room->enrollRoom()->latest()->take(4)->get() as $enrollment)
                                @if($enrollment->user)
                                    <img src="{{ asset('storage/' . $enrollment->user->photo_path) }}" 
                                    class="w-6 h-6 rounded-full"/>
                                @endif
                                @empty
                                    <p class="text-gray-400 dark:text-gray-500">No members yet</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <p class="text-gray-700 dark:text-gray-300">No rooms found.</p>
        @endforelse
    </div>
</div>
@endsection
