@extends('template.dashboard-template')

@section('content')
<div class="head-title mb-6">
    <div class="left">
        <h1 class="text-3xl font-bold">Rooms</h1>
        <ul class="breadcrumb flex items-center text-gray-500">
            <li>
                <a href="#" class="text-blue-500 hover:underline">Dashboard</a>
            </li>
            <li class="mx-2"><i class='bx bx-chevron-right'></i></li>
            <li>
                <a href="#" class="text-blue-500 hover:underline">Rooms</a>
            </li>
            <li class="mx-2"><i class='bx bx-chevron-right'></i></li>
            <li>
                <a href="#" class="text-blue-500 hover:underline">My Rooms</a>
            </li>
            <li class="mx-2"><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active font-bold" href="#">Details</a>
            </li>
        </ul>
    </div>
</div>

@if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('handle-enroll-attendance',['attendance' => $attendance->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="attendance_id" value="{{ $attendance->id }}">

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">Attendance Information</h2>
            <p class="text-gray-600">Here you can mark your attendance, specify your status, and share your location.</p>
        </div>
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold mb-4">{{ $attendance->name }}</h3>
            <div class="mb-4">
                <p class="text-gray-600 mb-1">Description</p>
                <p class="text-gray-800">{{ $attendance->description }}</p>
            </div>
            <div class="mb-4">
                <p class="text-gray-600 mb-1">Start Time</p>
                <p class="text-gray-800">{{ $attendance->start_time }}</p>
            </div>
            <div class="mb-4">
                <p class="text-gray-600 mb-1">End Time</p>
                <p class="text-gray-800">{{ $attendance->end_time }}</p>
            </div>
            <div class="flex items-center">
                <p class="text-gray-600 mr-2">Status:</p>
                <span class="px-2 py-1 text-sm font-semibold text-white bg-green-500 rounded-full">On Time</span>
            </div>
        </div>
        
        <div class="mb-6">
            <label class="block text-lg font-medium text-gray-700 mb-2">Attendance Status</label>
            <div class="flex space-x-4">
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" name="attendance_status" value="Present" required>
                    <span class="ml-2">Present</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" name="attendance_status" value="Absent" required>
                    <span class="ml-2">Absent</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" name="attendance_status" value="Leave" required>
                    <span class="ml-2">Leave</span>
                </label>
            </div>
        </div>

        <div class="mb-6">
            <label for="location" class="block text-lg font-medium text-gray-700">My Location</label>
            <div class="mt-2 flex">
                <input id="location" name="location" type="text" class="block w-full pl-3 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" readonly required>
                <button type="button" onclick="getLocation()" class="ml-3 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Get My Location</button>
            </div>
        </div>

        <div class="mb-6">
            <label for="photo" class="block text-lg font-medium text-gray-700">Take a Picture</label>
            <div class="mt-2 flex justify-center border-2 border-dashed border-gray-300 rounded-lg p-6">
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M16 10h16l4 4H40v24H8V14h4z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="24" cy="24" r="6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="mt-4 flex text-sm text-gray-600">
                        <label for="photo-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>Upload a file</span>
                            <input id="photo-upload" name="photo" type="file" class="sr-only" onchange="showPreview(event)" required>
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                </div>
            </div>
        </div>

        <div id="preview-container" class="hidden mb-6">
            <label class="block text-lg font-medium text-gray-700 mb-2">Image Preview</label>
            <img id="preview" class="w-48 h-48 border-2 border-gray-300 rounded-lg object-contain" src="" alt="Image Preview">
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
    </div>
</form>

<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        document.getElementById('location').value = "Latitude: " + position.coords.latitude + 
        ", Longitude: " + position.coords.longitude;
    }

    function showPreview(event) {
        const previewContainer = document.getElementById('preview-container');
        const previewImage = document.getElementById('preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
