@extends('template.dashboard-template')

@section('content')
<div class="head-title">
    <div class="left">
        <h1>Rooms</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a href="#">Rooms</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a href="#">My Rooms</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Details</a>
            </li>
        </ul>
    </div>
</div>

@if ($errors->any())
    <div class="text-red-600 mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black bg-opacity-50">
    <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-md mx-4 sm:mx-8">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 border-b dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                Create New Attendance
            </h3>
            <button type="button" class="text-gray-400 dark:text-gray-500 bg-transparent hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-gray-100 rounded-lg text-sm w-8 h-8 flex justify-center items-center" data-modal-toggle="crud-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <form class="p-4" action="{{ route('handle-create-attendance', ['room' => $room_id]) }}" method="POST">
            @csrf
            <input type="hidden" name="room_id" value="{{ $room_id }}">
            <div class="grid gap-4 mb-4 grid-cols-1">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter name" required>
                </div>
                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Description</label>
                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 dark:text-gray-100 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter description" required></textarea>
                </div>
                <div>
                    <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Start Time</label>
                    <input type="datetime-local" id="start_time" name="start_time" class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">End Time</label>
                    <input type="datetime-local" id="end_time" name="end_time" class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
            </div>
            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Add Attendance
            </button>
        </form>
    </div>
</div>

<div class="w-full min-h-screen flex flex-col items-center p-4">
    <!-- Room Details -->
    <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 w-full max-w-4xl flex flex-col rounded-xl shadow-lg p-6 mb-8">
        <div class="text-2xl font-bold">{{ $room_name }}</div>
        <div class="text-gray-600 dark:text-gray-400 mt-2">{{ $room_desc }}</div>
        <div class="text-gray-500 dark:text-gray-500 mt-4">
            <span class="font-semibold">Owner: {{ $owner->email }}</span>
        </div>
        <!-- Room Code -->
        <div class="flex items-center mt-4">
            <input id="room-code" type="text" value="{{ $room_code }}" class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mr-2" readonly>
            <button onclick="copyRoomCode()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Copy</button>
        </div>
    </div>
    
    @forelse ($attendances as $attendance)
        <!-- Cards -->
        <a href="{{ route('show-attendance-user-details', ['attendance' => $attendance->id]) }}" class="w-full max-w-4xl grid grid-cols-1 gap-4 transition-transform hover:scale-105 no-underline my-3">
            <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 flex flex-col rounded-xl shadow-lg dark:shadow-none hover:shadow-none transition-shadow duration-300 p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="rounded-full w-4 h-4 bg-purple-500"></div>
                        <div class="text-lg font-bold">{{ $attendance->name }}</div>
                    </div>
                    {{-- <div class="flex items-center space-x-4">
                        <div class="cursor-pointer">
                            <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/300" alt="Avatar"/>
                        </div>
                        <div class="text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                            </svg>
                        </div>
                    </div> --}}
                </div>
                <div class="mt-4">
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        {{ $attendance->description }}
                    </div>
                    <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <strong>Start:</strong> {{ $attendance->start_time }}
                    </div>
                    <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <strong>End:</strong> {{ $attendance->end_time }}
                    </div>
                </div>
            </div>
        </a>
    @empty
        <p class="text-gray-600 dark:text-gray-400">No attendances found.</p>
    @endforelse
</div>

<script>
    function copyRoomCode() {
        var roomCodeInput = document.getElementById('room-code');
        roomCodeInput.select();
        document.execCommand('copy');
        alert('Room code copied to clipboard!');
    }
</script>

@endsection
