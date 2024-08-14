@extends('template.dashboard-template')

@section('content')
<div class="head-title">
    <div class="left">
      <h1>Attendance</h1>
      <ul class="breadcrumb">
        <li>
          <a href="#">Dashboard</a>
        </li>
        <li><i class='bx bx-chevron-right' ></i></li>
        <li>
          <a class="active" href="#">Attendance</a>
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
        <h3>{{ $totalAttendances }}</h3>
        <p>Total Attendances</p>
      </span>
    </li>
    <li>
      <i class='bx bxs-group' ></i>
      <span class="text">
        <h3>{{ $onTimeAttendances }}</h3>
        <p>On Time</p>
      </span>
    </li>
    <li>
      <i class='bx bxs-dollar-circle' ></i>
      <span class="text">
        <h3>{{ $lateAttendances }}</h3>
        <p>Late</p>
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
 {{-- Pagination Links --}}
<div class="flex items-center justify-between mt-4">
  <div>
      <p class="text-sm text-gray-700 leading-5">
          Showing
          <span class="font-medium">{{ $attendances->firstItem() }}</span>
          to
          <span class="font-medium">{{ $attendances->lastItem() }}</span>
          of
          <span class="font-medium">{{ $attendances->total() }}</span>
          entries
      </p>
  </div>
  <div>
      <div class="relative z-0 inline-flex rounded-md shadow-sm" aria-label="Pagination">
          {{-- Previous Page Link --}}
          @if ($attendances->onFirstPage())
              <span class="relative inline-flex items-center px-3 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 cursor-not-allowed">
                  Previous
              </span>
          @else
              <a href="{{ $attendances->previousPageUrl() }}" class="relative inline-flex items-center px-3 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                  Previous
              </a>
          @endif

          {{-- Pagination Links --}}
          @for ($page = 1; $page <= $attendances->lastPage(); $page++)
              @if ($page == $attendances->currentPage())
                  <span class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                      {{ $page }}
                  </span>
              @else
                  <a href="{{ $attendances->url($page) }}" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                      {{ $page }}
                  </a>
              @endif
          @endfor

          {{-- Next Page Link --}}
          @if ($attendances->hasMorePages())
              <a href="{{ $attendances->nextPageUrl() }}" class="relative inline-flex items-center px-3 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                  Next
              </a>
          @else
              <span class="relative inline-flex items-center px-3 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 cursor-not-allowed">
                  Next
              </span>
          @endif
      </div>
  </div>
</div>



  
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