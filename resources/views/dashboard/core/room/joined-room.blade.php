@extends('template.dashboard-template')


@section('content')

<div class="head-title">
    <div class="left">
      <h1>Rooms</h1>
      <ul class="breadcrumb">
        <li>
          <a href="#">Dashboard</a>
        </li>
        <li><i class='bx bx-chevron-right' ></i></li>
        <li>
          <a class="" href="#">Rooms</a>
        </li>
        
        <li><i class='bx bx-chevron-right' ></i></li>
        <li>
          <a class="active" href="#">Joined Rooms</a>
        </li>
      </ul>
    </div>
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Join A Room
      </button>
  </div>


  <!-- Mini Navbar -->
  <div class="flex space-x-4 mt-4">
    <a href="{{ route('show-myrooms') }}" class="btn-nav bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
        My Rooms
    </a>
    <a href="{{ route('show-joinedrooms') }}" class="btn-nav bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
        Joined Rooms
    </a>
  </div>


 <!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black bg-opacity-50">
    <div class="relative bg-white rounded-lg shadow-lg w-full max-w-md mx-4 sm:mx-8">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 border-b">
            <h3 class="text-lg font-semibold text-gray-900">
                Join Room
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center" data-modal-toggle="crud-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <form class="p-4" action="{{ route('handle-enroll') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="room_code" class="block mb-2 text-sm font-medium text-gray-900">Room Code</label>
                <input type="text" name="room_code" id="room_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter room code" required>
            </div>
            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Join Room
            </button>
        </form>
    </div>
</div>



  <div class="flex flex-wrap mt-10">
    @forelse ($rooms as $room)
       <!-- card -->
<a href="{{ route('show-joinedrooms-details', ['room' => $room->id]) }}" 
    class="relative bg-white dark:bg-gray-800 py-6 px-6 rounded-3xl w-full sm:w-64 md:w-1/4 lg:w-1/4 my-6 mx-2 shadow-xl transform transition-transform duration-300 ease-in-out hover:scale-105">
     <div class="text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-pink-500 left-4 -top-6">
         <!-- svg -->
         <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
         </svg>
     </div>
     <div class="mt-8">
         <p class="text-xl font-semibold my-2 text-gray-800 dark:text-gray-100">{{ $room->name }}</p>
         <div class="flex space-x-2 text-gray-400 dark:text-gray-400 text-sm">
             <!-- svg -->
             <p>{{ $room->description }}</p>
         </div>
        
         <div class="border-t-2 border-gray-200 dark:border-gray-600 mt-10"></div>
 
         <div class="flex justify-between">
             <div class="my-2">
                 <p class="font-semibold text-base mb-2 text-gray-800 dark:text-gray-100">Team Member</p>
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
    <div class="flex flex-col items-center justify-center w-full h-64 text-center ">
        <div class="text-6xl text-gray-400 mt-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6" />
            </svg>
        </div>
        <p class="text-xl font-semibold text-gray-700 mt-4">Belum Ada Room Tersedia</p>
        <p class="text-gray-500 mt-2">Silahkan Buat Room Untuk Kebutuhan Absensi Anda</p>
        <div class="mt-6">
            <a href="#" 
               data-modal-target="crud-modal" 
               data-modal-toggle="crud-modal" 
               class="text-indigo-500 hover:text-indigo-600 font-semibold">
                Join A New Room
            </a>
        </div>
    </div>
    @endforelse
</div>


@endsection