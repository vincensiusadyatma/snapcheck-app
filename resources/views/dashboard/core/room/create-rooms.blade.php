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
          <a class="#" href="#">Rooms</a>
        </li>
        <li><i class='bx bx-chevron-right' ></i></li>
        <li>
            <a class="active" href="#">Create</a>
          </li>
      </ul>
    </div>
    <a href="{{ route('create-room',['user'=> auth()->user()->username]) }}" class="btn-download">
      <i class='bx bxs-add-to-queue' ></i>
      <span class="text">Back</span>
    </a>
  </div>
<div class="flex items-center justify-center p-12">
    <!-- Author: FormBold Team -->
    <div class="mx-auto w-full ">
        <form action="{{ route('handle-create') }}" method="POST">
            @csrf
            @if ($errors->any())
            <div class="text-red-600">
                    <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                </div>
            @endif

            <div class="mb-5">
                <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                    Room Name
                </label>
                <input type="text" name="name" id="name" placeholder="Room Name"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div class="mb-5">
                <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                    Email Adress
                </label>
                <input type="text" name="email" id="phone" placeholder="Enter your email address"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div class="mb-5">
                <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                    Description
                </label>
                <textarea name="description" id="description" placeholder="Enter description"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
            </div>
            <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="capacity" class="mb-3 block text-base font-medium text-[#07074D]">
                            Capacity
                        </label>
                        <input type="number" name="capacity" id="capacity" placeholder="Enter capacity"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="room-type" class="mb-3 block text-base font-medium text-[#07074D]">
                            Room Type
                        </label>
                        <select name="room_type" id="room-type"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="" disabled selected>Select room type</option>
                            <option value="office">Office</option>
                            <option value="school">School</option>
                        </select>
                    </div>
                </div>
                
            </div>
        
            <div>
                <button
                    class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                    Create A Room
                </button>
            </div>
        </form>
        
    </div>
</div>

@endsection