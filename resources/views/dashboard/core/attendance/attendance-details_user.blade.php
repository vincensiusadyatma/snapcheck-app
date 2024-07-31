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

<div class="bg-white shadow-md rounded-lg p-6">
    <div class="mb-6">
        <h2 class="text-2xl font-semibold mb-2">Attendance Information</h2>
        <p class="text-gray-600">Here you can mark your attendance, specify your status, and share your location.</p>
    </div>

    <div class="mb-6">
        <label class="block text-lg font-medium text-gray-700 mb-2">Attendance Status</label>
        <div class="flex space-x-4">
            <label class="inline-flex items-center">
                <input type="radio" class="form-radio text-indigo-600" name="attendance-status" value="Present">
                <span class="ml-2">Present</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" class="form-radio text-indigo-600" name="attendance-status" value="Absent">
                <span class="ml-2">Absent</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" class="form-radio text-indigo-600" name="attendance-status" value="Leave">
                <span class="ml-2">Leave</span>
            </label>
        </div>
    </div>

    <div class="mb-6">
        <label for="location" class="block text-lg font-medium text-gray-700">My Location</label>
        <div class="mt-2 flex">
            <input id="location" name="location" type="text" class="block w-full pl-3 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" readonly>
            <button onclick="getLocation()" class="ml-3 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Get My Location</button>
        </div>
    </div>

    <div class="mb-6">
        <label for="picture" class="block text-lg font-medium text-gray-700">Take a Picture</label>
        <div class="mt-2 flex justify-center border-2 border-dashed border-gray-300 rounded-lg p-6">
            <div class="text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M16 10h16l4 4H40v24H8V14h4z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="24" cy="24" r="6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="mt-4 flex text-sm text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <span>Upload a file</span>
                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                    </label>
                    <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
            </div>
        </div>
    </div>
</div>

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
</script>
@endsection
