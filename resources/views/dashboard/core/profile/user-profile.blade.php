@extends('template.dashboard-template')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
    <div class="flex items-center space-x-4 mb-6">
        <img class="w-20 h-20 rounded-full border-2 border-gray-300 dark:border-gray-600" src="https://via.placeholder.com/150" alt="User Avatar">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">{{ $user->username }}</h2>
            <p class="text-gray-500 dark:text-gray-400">Senior Software Engineer</p>
        </div>
    </div>

    <!-- Informasi Umum -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow text-center">
            <i class='bx bxs-user text-3xl text-gray-700 dark:text-gray-300 mb-2'></i>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Full Name</h3>
            <p class="text-gray-600 dark:text-gray-400">{{ $user->full_name }}</p>
        </div>
        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow text-center">
            <i class='bx bxs-envelope text-3xl text-gray-700 dark:text-gray-300 mb-2'></i>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Email</h3>
            <p class="text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
        </div>
        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow text-center">
            <i class='bx bxs-phone text-3xl text-gray-700 dark:text-gray-300 mb-2'></i>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Phone</h3>
            <p class="text-gray-600 dark:text-gray-400">{{ $user->phone_number }}</p>
        </div>
    </div>

    <!-- Statistik Diagram -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-blue-100 dark:bg-blue-900 p-4 rounded-lg text-center">
            <i class='bx bxs-chart text-3xl text-blue-600 dark:text-blue-400'></i>
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mt-2">Projects Completed</h3>
            <p class="text-3xl font-bold text-gray-800 dark:text-gray-100">85%</p>
            <div class="relative pt-1">
                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200 dark:bg-blue-700">
                    <div style="width:85%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600 dark:bg-blue-500"></div>
                </div>
            </div>
        </div>
        <div class="bg-green-100 dark:bg-green-900 p-4 rounded-lg text-center">
            <i class='bx bxs-bar-chart-alt-2 text-3xl text-green-600 dark:text-green-400'></i>
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mt-2">Tasks Completed</h3>
            <p class="text-3xl font-bold text-gray-800 dark:text-gray-100">75%</p>
            <div class="relative pt-1">
                <div class="overflow-hidden h-2 text-xs flex rounded bg-green-200 dark:bg-green-700">
                    <div style="width:75%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-600 dark:bg-green-500"></div>
                </div>
            </div>
        </div>
        <div class="bg-red-100 dark:bg-red-900 p-4 rounded-lg text-center">
            <i class='bx bxs-pie-chart-alt-2 text-3xl text-red-600 dark:text-red-400'></i>
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mt-2">Overall Efficiency</h3>
            <p class="text-3xl font-bold text-gray-800 dark:text-gray-100">90%</p>
            <div class="relative pt-1">
                <div class="overflow-hidden h-2 text-xs flex rounded bg-red-200 dark:bg-red-700">
                    <div style="width:90%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-600 dark:bg-red-500"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg text-center">
            <i class='bx bxs-timer text-3xl text-gray-600 dark:text-gray-400'></i>
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mt-2">Hours Worked</h3>
            <p class="text-3xl font-bold text-gray-800 dark:text-gray-100">1,245 hrs</p>
        </div>
        <div class="bg-purple-100 dark:bg-purple-900 p-4 rounded-lg text-center">
            <i class='bx bxs-crown text-3xl text-purple-600 dark:text-purple-400'></i>
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mt-2">Top Skill</h3>
            <p class="text-3xl font-bold text-gray-800 dark:text-gray-100">Laravel</p>
        </div>
    </div>
</div>
@endsection
