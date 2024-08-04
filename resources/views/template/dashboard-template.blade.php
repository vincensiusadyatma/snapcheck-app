<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
	<link rel="shortcut icon" href="{{ asset('img/logo/snapcheck logo.png') }}">
	<!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
	@notifyCss
    @vite('resources/css/app.css')
   
	<style>
		.notify {
    z-index: 9999; /* Pastikan z-index ini lebih tinggi dari elemen lainnya */
}
	</style>
	
	<title>SnapCheck</title>
</head>
<body>
	<!-- SIDEBAR -->
        @include('component.sidebar-dashboard')
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
            @include('component.navbar-dashboard')
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			@yield('content')
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	

	<!-- Additional Scripts -->
	@stack('scripts')
	


	<script src="{{ asset('js/dashboard.js') }}"></script>


	<x-notify::notify />
    @notifyJs
</body>
</html>