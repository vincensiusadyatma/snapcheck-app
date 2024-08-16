@extends('template.dashboard-template')

@section('content')
<div class="head-title mb-6">
    <div class="left">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Rooms</h1>
        <ul class="breadcrumb flex items-center text-gray-500 dark:text-gray-400">
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
                <a class="active font-bold text-gray-900 dark:text-gray-100" href="#">Details</a>
            </li>
        </ul>
    </div>
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Add Attendance
    </button>
</div>

<div class="max-w-4xl mx-auto bg-white dark:bg-gray-900 p-8 rounded-xl shadow-lg mt-8">
    <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Edit Attendance</h2>
    <form action="" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Attendance Name</label>
            <input type="text" name="name" id="name" value="{{ $attendance->name }}" class="mt-1 block w-full rounded-xl border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 sm:text-sm py-2 px-4">
        </div>
        <div>
            <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" value="{{ $attendance->start_time }}" class="mt-1 block w-full rounded-xl border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 sm:text-sm py-2 px-4">
        </div>
        <div>
            <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" value="{{ $attendance->end_time }}" class="mt-1 block w-full rounded-xl border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 sm:text-sm py-2 px-4">
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
            <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-xl border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 sm:text-sm py-2 px-4">{{ $attendance->description }}</textarea>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 dark:bg-blue-500 text-white dark:text-gray-100 px-4 py-2 rounded-md hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                Update Attendance
            </button>
        </div>
    </form>
</div>

<div class="max-w-4xl mx-auto bg-white dark:bg-gray-900 p-8 rounded-xl shadow-lg mt-8">
    <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Absentees List</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Name
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Email
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                @foreach ($absentees as $absentee)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                        {{ $absentee->user->full_name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                        {{ $absentee->user->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                        {{ $absentee->status }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                        <a href="{{ route('show-attendance-enroll-details',['attendance'=>$attendance->id,'enroll'=> $absentee->id]) }}" class="px-4 py-2 text-white bg-indigo-600 dark:bg-indigo-500 hover:bg-indigo-700 dark:hover:bg-indigo-400 rounded-md">View Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
