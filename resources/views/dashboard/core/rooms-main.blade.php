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
          <a class="active" href="#">Rooms</a>
        </li>
      </ul>
    </div>
    <a href="{{ route('create-room',['user'=> auth()->user()->username]) }}" class="btn-download">
      <i class='bx bxs-add-to-queue' ></i>
      <span class="text">Create A Room</span>
    </a>
  </div>

  <!-- Mini Navbar -->
<div class="flex space-x-4 mt-4">
    <a href="{{ route('show-myrooms', ['user' => auth()->user()->username]) }}" class="btn-nav bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
        My Rooms
    </a>
    <a href="{{ route('show-rooms', ['user' => auth()->user()->username]) }}" class="btn-nav bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
        Joined Rooms
    </a>
</div>


@endsection