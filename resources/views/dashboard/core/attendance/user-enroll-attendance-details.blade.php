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
                    <a class="" href="#">Rooms</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="" href="#">My Rooms</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Details</a>
                </li>
            </ul>
        </div>
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Add Attendance
        </button>
    </div>

    <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="col-span-1 space-y-4">
                    <div class="bg-white shadow-lg rounded-lg p-4">
                        <div class="mb-4">
                            <label class="text-gray-600">Waktu Presensi</label>
                            <p>{{ $enroll->check_in_time }}</p>
                        </div>
                        <div class="mb-4">
                            <label class="text-gray-600">Status</label>
                            <p class="text-green-500">Tepat Waktu</p>
                        </div>
                        <div class="mb-4">
                            <label class="text-gray-600">Shift</label>
                            <p>Shift Siang</p>
                        </div>
                        <div class="mb-4">
                            <label class="text-gray-600">Jadwal Shift</label>
                            <p>12:00:00 - 18:00:00</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-4">
                        <h5 class="font-bold text-lg mb-4">Foto</h5>
                        <img src="{{ asset('storage/' . $enroll->photo) }} " class="w-full h-auto rounded-lg" alt="AI Generated Photo">
                        <strong class="block mt-2 text-center">Your Photo</strong>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 space-y-4">
                    <div class="bg-white shadow-lg rounded-lg p-4">
                        <h5 class="font-bold text-lg mb-4">Detail Lokasi</h5>
                        <div class="mb-4">
                            <label class="text-gray-600">Lokasi</label>
                            <div id="map" class="w-full h-96"></div>
                        </div>
                        <div class="mb-4">
                            <label class="text-gray-600">Informasi Perangkat</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                <p>Device: {{ $enroll->device_info }}</p>
                                <p>OS: {{ $enroll->os_info }}</p>
                                <p>IP: {{ $enroll->ip_address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var lat = {{ $enroll->latitude }}, long = {{ $enroll->longitude }};
        var map = L.map('map', {
            attributionControl: false
        }).setView([lat, long], 18);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var marker = L.marker([lat, long], {
            draggable: false
        }).addTo(map);
    </script>
    <script>
        document.getElementById('sidebar-toggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('hidden');
        });
    </script>




@endsection
