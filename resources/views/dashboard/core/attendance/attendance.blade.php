@extends('template.dashboard-template')

@section('content')
<div class="head-title">
    <div class="left">
      <h1>Dashboard</h1>
      <ul class="breadcrumb">
        <li>
          <a href="#">Dashboard</a>
        </li>
        <li><i class='bx bx-chevron-right' ></i></li>
        <li>
          <a class="active" href="#">Main</a>
        </li>
      </ul>
    </div>
    <a href="#" class="btn-download">
      <i class='bx bxs-cloud-download' ></i>
      <span class="text">Download PDF</span>
    </a>
  </div>

  <ul class="box-info">
    <li>
      <i class='bx bxs-calendar-check' ></i>
      <span class="text">
        <h3></h3>
        <p>Percentage</p>
      </span>
    </li>
    <li>
      <i class='bx bxs-group' ></i>
      <span class="text">
        <h3></h3>
        <p>My Rooms</p>
      </span>
    </li>
    <li>
      <i class='bx bxs-dollar-circle' ></i>
      <span class="text">
        <h3></h3>
        <p>Joined Rooms</p>
      </span>
    </li>
  </ul>

  <table class="w-full mt-10">
    <thead>
      <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-200">
        <th class="px-4 py-3">Attendance Name</th>
        <th class="px-4 py-3">Room</th>
        <th class="px-4 py-3">Remaining Time</th>
        <th class="px-4 py-3">Status</th>
      </tr>
    </thead>
    <tbody class="bg-white">
      @forelse ($attendances as $attendance)
      <tr class="text-gray-700 clickable-row cursor-pointer hover:bg-gray-100" data-href="{{ route('show-attendance-user-details', ['attendance' => $attendance->id]) }}">
        <td class="px-4 py-3 border">
          <div class="flex items-center text-sm">
            <div>
              <p class="font-semibold text-black">{{ $attendance->name }}</p>
            </div>
          </div>
        </td>
        <td class="px-4 py-3 text-md font-semibold border">{{ $attendance->room->name }}</td>
        <td class="px-4 py-3 text-sm border">
          @if ($attendance->status == 'Late')
              @if (abs($attendance->remaining_time['days']) > 0)
                  <span class="text-red-500">Over {{ abs($attendance->remaining_time['days']) }} days, {{ abs($attendance->remaining_time['hours']) }} hours Late</span>
              @elseif (abs($attendance->remaining_time['hours']) > 0)
                  <span class="text-red-500">Over {{ $attendance->remaining_time['hours'] }} hours, {{ $attendance->remaining_time['minutes'] }} minutes Late</span>
              @else
                  <span class="text-red-500">Over {{ abs($attendance->remaining_time['minutes']) }} minutes, {{ abs($attendance->remaining_time['seconds']) }} seconds Late</span>
              @endif
          @else
              @if ($attendance->remaining_time['days'] > 0)
                  {{ $attendance->remaining_time['days'] }} days, {{ $attendance->remaining_time['hours'] }} hours
              @elseif ($attendance->remaining_time['hours'] > 0)
                  {{ $attendance->remaining_time['hours'] }} hours, {{ $attendance->remaining_time['minutes'] }} minutes
              @else
                  {{ $attendance->remaining_time['minutes'] }} minutes, {{ $attendance->remaining_time['seconds'] }} seconds
              @endif
          @endif
      </td>
        <td class="px-4 py-3 text-sm border flex justify-center">
          <span class="px-4 py-2 font-semibold leading-tight text-white text-center
            @if ($attendance->status == 'Late')
              bg-red-500
            @else
              bg-green-500
            @endif
            rounded-full">
            {{ $attendance->status }}
          </span>
        </td>
      </tr>
      @empty
        <tr class="text-gray-700">
          <td colspan="4" class="px-4 py-3 text-center border">No attendance</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  
@endsection

@push('scripts')
  <script>


    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.clickable-row').forEach(function (row) {
        row.addEventListener('click', function () {
          window.location.href = this.getAttribute('data-href');
        });
      });
    });
  </script>
@endpush