@extends('template.dashboard-template')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
    <div class="flex items-center space-x-4 mb-6">
        <img class="w-20 h-20 rounded-full border-2 border-gray-300" src="https://via.placeholder.com/150" alt="User Avatar">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">John Doe</h2>
            <p class="text-gray-500">Senior Software Engineer</p>
        </div>
    </div>

    <!-- Informasi Umum -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-gray-100 p-4 rounded-lg shadow text-center">
            <i class='bx bxs-user text-3xl text-gray-700 mb-2'></i>
            <h3 class="text-lg font-semibold text-gray-800">Full Name</h3>
            <p class="text-gray-600">John Doe</p>
        </div>
        <div class="bg-gray-100 p-4 rounded-lg shadow text-center">
            <i class='bx bxs-envelope text-3xl text-gray-700 mb-2'></i>
            <h3 class="text-lg font-semibold text-gray-800">Email</h3>
            <p class="text-gray-600">johndoe@example.com</p>
        </div>
        <div class="bg-gray-100 p-4 rounded-lg shadow text-center">
            <i class='bx bxs-phone text-3xl text-gray-700 mb-2'></i>
            <h3 class="text-lg font-semibold text-gray-800">Phone</h3>
            <p class="text-gray-600">+123 456 7890</p>
        </div>
    </div>

    <!-- Statistik Diagram -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-blue-100 p-4 rounded-lg text-center">
            <i class='bx bxs-chart text-3xl text-blue-600'></i>
            <h3 class="text-xl font-semibold text-gray-800 mt-2">Projects Completed</h3>
            <p class="text-3xl font-bold text-gray-800">85%</p>
            <div class="relative pt-1">
                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                    <div style="width:85%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600"></div>
                </div>
            </div>
        </div>
        <div class="bg-green-100 p-4 rounded-lg text-center">
            <i class='bx bxs-bar-chart-alt-2 text-3xl text-green-600'></i>
            <h3 class="text-xl font-semibold text-gray-800 mt-2">Tasks Completed</h3>
            <p class="text-3xl font-bold text-gray-800">75%</p>
            <div class="relative pt-1">
                <div class="overflow-hidden h-2 text-xs flex rounded bg-green-200">
                    <div style="width:75%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-600"></div>
                </div>
            </div>
        </div>
        <div class="bg-red-100 p-4 rounded-lg text-center">
            <i class='bx bxs-pie-chart-alt-2 text-3xl text-red-600'></i>
            <h3 class="text-xl font-semibold text-gray-800 mt-2">Overall Efficiency</h3>
            <p class="text-3xl font-bold text-gray-800">90%</p>
            <div class="relative pt-1">
                <div class="overflow-hidden h-2 text-xs flex rounded bg-red-200">
                    <div style="width:90%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-600"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gray-100 p-4 rounded-lg text-center">
            <i class='bx bxs-timer text-3xl text-gray-600'></i>
            <h3 class="text-xl font-semibold text-gray-800 mt-2">Hours Worked</h3>
            <p class="text-3xl font-bold text-gray-800">1,245 hrs</p>
        </div>
        <div class="bg-purple-100 p-4 rounded-lg text-center">
            <i class='bx bxs-crown text-3xl text-purple-600'></i>
            <h3 class="text-xl font-semibold text-gray-800 mt-2">Top Skill</h3>
            <p class="text-3xl font-bold text-gray-800">Laravel</p>
        </div>
    </div>
</div>
@endsection
