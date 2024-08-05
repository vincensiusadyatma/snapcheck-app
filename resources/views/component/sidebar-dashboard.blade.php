<section id="sidebar">
  <a href="#" class="brand">
    <img src="{{ asset('img/logo/snapcheck logo.png') }}" alt="" class="w-[20px] mr-5 ml-5">
    <span class="text">SnapCheck</span>
  </a>
  <ul class="side-menu top">
    <li class="{{ request()->routeIs('show-dashboard') ? 'active' : '' }}">
      <a href="{{ route('show-dashboard') }}">
        <i class='bx bxs-dashboard' ></i>
        <span class="text">Dashboard</span>
      </a>
    </li>
    <li class="{{ request()->routeIs('show-rooms','show-myrooms','show-joinedrooms') ? 'active' : '' }}">
      <a href="{{ route('show-rooms') }}">
        <i class='bx bxs-shopping-bag-alt' ></i>
        <span class="text">Rooms</span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class='bx bxs-doughnut-chart' ></i>
        <span class="text">Attendance</span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class='bx bxs-message-dots' ></i>
        <span class="text">Todos</span>
      </a>
    </li>
    <li class="{{ request()->routeIs('show-profile') ? 'active' : '' }}">
      <a href="{{ route('show-profile') }}">
        <i class='bx bxs-group' ></i>
        <span class="text">Profile</span>
      </a>
    </li>
  </ul>
  <ul class="side-menu">
    <li>
      <a href="#">
        <i class='bx bxs-cog' ></i>
        <span class="text">Settings</span>
      </a>
    </li>
    <li>
      <a href="{{ route('handle_logout') }}" class="logout">
        <i class='bx bxs-log-out-circle' ></i>
        <span class="text">Logout</span>
      </a>
    </li>
  </ul>
</section>
