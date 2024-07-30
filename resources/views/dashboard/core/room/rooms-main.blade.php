@extends('template.dashboard-template')

@section('content')
<div class="head-title flex items-center justify-between">
    <div class="left">
        <h1>Rooms Dashboard</h1>
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li><a class="active" href="#">Rooms</a></li>
        </ul>
    </div>
    <!-- Room Counts -->
<div class="mt-4 flex justify-end space-x-4">
  <div class="bg-blue-500 text-white py-2 px-4 rounded">
      <h2 class="text-xl font-semibold">My Rooms</h2>
      <p class="text-lg">{{ $myRoomsCount }}</p>
  </div>
  <div class="bg-green-500 text-white py-2 px-4 rounded">
      <h2 class="text-xl font-semibold">Joined Rooms</h2>
      <p class="text-lg">{{ $joinedRoomsCount }}</p>
  </div>
</div>
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



<!-- Latest My Rooms -->
<div class="mt-6">
  <h2 class="text-2xl font-semibold">Latest My Rooms</h2>
  <div class="rooms-list mt-4 flex flex-wrap">
      @forelse($myRooms as $room)
          <!-- Card -->
          <a href="{{ route('show-myrooms-details', ['user' => auth()->user()->username, 'room' => $room->id]) }}" 
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
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                      <p>Marketing Team</p>
                  </div>
                  <div class="flex space-x-2 text-gray-400 text-sm my-3">
                      <!-- SVG Icon -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                      <p>1 Week Left</p>
                  </div>
                  <div class="border-t-2"></div>
                  <div class="flex justify-between">
                      <div class="my-2">
                          <p class="font-semibold text-base mb-2">Team Member</p>
                          <div class="flex space-x-2">
                              <img src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" 
                                   class="w-6 h-6 rounded-full"/>
                              <img src="https://upload.wikimedia.org/wikipedia/commons/e/ec/Woman_7.jpg" 
                                   class="w-6 h-6 rounded-full"/>
                              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxSqK0tVELGWDYAiUY1oRrfnGJCKSKv95OGUtm9eKG9HQLn769YDujQi1QFat32xl-BiY&usqp=CAU" 
                                   class="w-6 h-6 rounded-full"/>
                          </div>
                      </div>
                      <div class="my-2">
                          <p class="font-semibold text-base mb-2">Progress</p>
                          <div class="text-base text-gray-400 font-semibold">
                              <p>34%</p>
                          </div>
                      </div>
                  </div>
              </div>
          </a>
      @empty
          <p>No rooms found.</p>
      @endforelse
  </div>
</div>

<!-- Latest Joined Rooms -->
<div class="mt-6">
  <h2 class="text-2xl font-semibold">Latest Joined Rooms</h2>
  <div class="rooms-list mt-4 flex flex-wrap">
      @forelse($joinedRooms as $room)
          <!-- Card -->
          <a href="" 
             class="relative bg-white py-6 px-6 rounded-3xl w-full sm:w-64 md:w-1/4 lg:w-1/4 my-6 mx-2 shadow-xl transform transition-transform duration-300 ease-in-out hover:scale-105">
              <div class="text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
                  <!-- SVG Icon -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                  </svg>
              </div>
              <div class="mt-8">
                  <p class="text-xl font-semibold my-2">{{ $room->name }}</p>
                  <div class="flex space-x-2 text-gray-400 text-sm">
                      <!-- SVG Icon -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                      <p>Team Member</p>
                  </div>
                  <div class="flex space-x-2 text-gray-400 text-sm my-3">
                      <!-- SVG Icon -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                      <p>1 Week Left</p>
                  </div>
                  <div class="border-t-2"></div>
                  <div class="flex justify-between">
                      <div class="my-2">
                          <p class="font-semibold text-base mb-2">Team Member</p>
                          <div class="flex space-x-2">
                              <img src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" 
                                   class="w-6 h-6 rounded-full"/>
                              <img src="https://upload.wikimedia.org/wikipedia/commons/e/ec/Woman_7.jpg" 
                                   class="w-6 h-6 rounded-full"/>
                              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxSqK0tVELGWDYAiUY1oRrfnGJCKSKv95OGUtm9eKG9HQLn769YDujQi1QFat32xl-BiY&usqp=CAU" 
                                   class="w-6 h-6 rounded-full"/>
                          </div>
                      </div>
                      <div class="my-2">
                          <p class="font-semibold text-base mb-2">Progress</p>
                          <div class="text-base text-gray-400 font-semibold">
                              <p>34%</p>
                          </div>
                      </div>
                  </div>
              </div>
          </a>
      @empty
          <p>No rooms found.</p>
      @endforelse
  </div>
</div>
@endsection
