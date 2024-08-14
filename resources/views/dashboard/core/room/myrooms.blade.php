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
          <a class="active" href="#">My Rooms</a>
        </li>
      </ul>
    </div>
    <a href="{{ route('create-room') }}" class="btn-download">
      <i class='bx bxs-add-to-queue' ></i>
      <span class="text">Create A Room</span>
    </a>
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


  <div class="flex flex-wrap mt-10">
    @forelse ($rooms as $room)
        <!-- card -->
        <a href="{{ route('show-myrooms-details', ['room' => $room->id]) }}" 
            class="relative bg-white py-6 px-6 rounded-3xl w-full sm:w-64 md:w-1/4 lg:w-1/4 my-6 mx-2 shadow-xl transform transition-transform duration-300 ease-in-out hover:scale-105">
             <div class="text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-pink-500 left-4 -top-6">
                 <!-- SVG Icon -->
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                 </svg>
             </div>
             <div class="mt-8">
                 <p class="text-xl font-semibold my-2">{{ $room->name }}</p>
                 <div class="flex space-x-2 text-gray-400 text-sm">
                     <!-- SVG Icon -->
                     <p>{{ $room->description }}</p>
                 </div>
                
                 <div class="border-t-2 mt-10"></div>
                 <div class="flex justify-between">
                     <div class="my-2">
                         <p class="font-semibold text-base mb-2">Team Member</p>
                         <div class="flex space-x-2">
                           @forelse ($room->enrollRoom()->latest()->take(4)->get() as $enrollment)
                           @if($enrollment->user)
                               <img src="{{ asset('storage/' . $enrollment->user->photo_path) }}" 
                               class="w-6 h-6 rounded-full"/>
                           @endif
                       @empty
                           <p>No members yet</p>
                       @endforelse
                             
                         </div>
                     </div>
                     
                 </div>
             </div>
         </a>
    @empty
        <!-- Tampilkan pesan atau elemen lain jika koleksi kosong -->
        <div class="flex flex-col items-center justify-center w-full h-64 text-center ">
          <div class="text-6xl text-gray-400 mt-8">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6" />
              </svg>
          </div>
          <p class="text-xl font-semibold text-gray-700 mt-4">Belum Ada Room Tersedia</p>
          <p class="text-gray-500 mt-2">Silahkan Buat Room Untuk Kebutuhan Absensi Anda</p>
          <div class="mt-6">
              <a href="" class="text-indigo-500 hover:text-indigo-600 font-semibold">
                  Create A New Room
              </a>
          </div>
      </div>
    @endforelse
</div>


@endsection