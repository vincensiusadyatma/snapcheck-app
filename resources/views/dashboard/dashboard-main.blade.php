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
        <h3>{{ $percentage }} %</h3>
        <p>Percentage</p>
      </span>
    </li>
    <li>
      <i class='bx bxs-group' ></i>
      <span class="text">
        <h3>{{ $myRoomsCount }}</h3>
        <p>My Rooms</p>
      </span>
    </li>
    <li>
      <i class='bx bxs-dollar-circle' ></i>
      <span class="text">
        <h3>{{ $joinedRoomsCount }}</h3>
        <p>Joined Rooms</p>
      </span>
    </li>
  </ul>

  <div class="table-data">
    <div class="order">
      <div class="head">
        <h3>Absente Todo</h3>
        <i class='bx bx-search' ></i>
        <i class='bx bx-filter' ></i>
      </div>
      <table>
        <thead>
          <tr>
            <th>Attendance Name</th>
            <th>Remaining Time</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($list_attendances as $attendance)
          
              <tr class="clickable-row cursor-pointer" data-href="{{ route('show-attendance-user-details', ['attendance' => $attendance->id]) }}"
                >
                <td>
                  <p>{{$attendance->name }}</p>
                </td>
                <td>
                  @if ($attendance->remaining_time['days'] > 0)
                      {{ $attendance->remaining_time['days'] }} days,
                      {{ $attendance->remaining_time['hours'] }} hours
                  @elseif ($attendance->remaining_time['hours'] > 0)
                      {{ $attendance->remaining_time['hours'] }} hours,
                      {{ $attendance->remaining_time['minutes'] }} minutes
                  @else
                      {{ $attendance->remaining_time['minutes'] }} minutes,
                      {{ $attendance->remaining_time['seconds'] }} seconds
                  @endif
              </td>
                <td><span class="status pending">Not Absente</span></td>
              </tr>
          
          @empty
          @endforelse
        </tbody>
      </table>
      
    </div>
    <div class="todo">
      <div class="head">
        <h3>Todos</h3>
        <i class='bx bx-plus' ></i>
        <i class='bx bx-filter' ></i>
      </div>
      <canvas id="pieChart"></canvas>
    </div>
  </div>

  <div>
    <canvas id="lineChart"></canvas>
  </div>
  

  
  @push('scripts')
    <script>


      document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.clickable-row').forEach(function (row) {
          row.addEventListener('click', function () {
            window.location.href = this.getAttribute('data-href');
          });
        });
      });




      // Line Chart
      const lineCtx = document.getElementById('lineChart').getContext('2d');
      new Chart(lineCtx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June'],
          datasets: [{
            label: 'Sales',
            data: [12, 19, 3, 5, 2, 3],
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

      // Pie Chart
      const pieCtx = document.getElementById('pieChart').getContext('2d');
      new Chart(pieCtx, {
        type: 'pie',
        data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [{
            label: 'Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        }
      });
    </script>
  @endpush
  
@endsection
