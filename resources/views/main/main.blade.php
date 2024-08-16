@extends('template.main-template')

@section('content')
{{-- first landing section jumbotron --}}
<div class="relative h-screen bg-cover bg-center" style="background-image: url('img/assets/jumbotron-bg.jpg');">
    <div class="absolute top-0 right-0 bottom-0 left-0 bg-gradient-to-t from-black via-black/70 to-transparent"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center text-white">
            <h1 class="text-4xl font-bold mb-4 drop-shadow-lg">Welcome to SnapCheck</h1>
            <p class="text-lg mb-8 drop-shadow-lg">Bangun Masa Depanmu Dengan Layanan Kami</p>
            <a href="#about" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 drop-shadow-lg">Learn More</a>
        </div>
    </div>
</div>

  
  
{{-- end landing section jumbotron --}}

{{-- 3 point advantage card --}}
<div class=" workspace container mx-auto mt-[-50px] relative z-20" data-aos="fade-up" data-aos-duration="500">
  <div class="flex justify-center ">
    <div class="w-full xs:w-[80%] ss:w-4/5 md:w-[90%] lg:w-auto flex justify-center">
      <div class="flex flex-col md:flex-row text-white rounded-2xl shadow-lg bg-blur p-4 space-y-4 md:space-y-0 md:space-x-4">
        <div class="flex-1 text-center p-4 flex flex-col items-center justify-center">
          <img src="img/assets/icons/time-icon2.png" class="icon mb-2 w-10 h-10">
          <div class="text-left">
            <h5 class="text-lg font-bold text-center">Fleksibel</h5>
            <p class="text-sm text-center">Diakses Dimana Saja</p>
          </div>
        </div>
        <div class="flex-1 text-center p-4 flex flex-col items-center justify-center">
          <img src="img/assets/icons/handshake-icon.png" class="icon mb-2 w-10 h-10">
          <div class="text-left">
            <h5 class="text-lg font-bold text-center">Terpercaya</h5>
            <p class="text-sm text-center">Dapat Diandalkan</p>
          </div>
        </div>
        <div class="flex-1 text-center p-4 flex flex-col items-center justify-center">
          <img src="img/assets/icons/global-icon.png" class="icon mb-2 w-7 h-7">
          <div class="text-left">
            <h5 class="text-lg font-bold text-center">Aman</h5>
            <p class="text-sm md:text-center">Data anda aman disimpan pada kami</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>




{{-- end 3 point advantage card --}}

{{-- about section --}}
<section id="tentang" class="bg-gray-800" id="about">
  <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6" data-aos="fade-right">
      <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold  text-white">Tentang Kami</h2>
          <p class="mb-4 text-white">SnapCheck adalah aplikasi absensi online berbasis GPS yang dirancang untuk memudahkan proses kehadiran bagi berbagai jenis organisasi. Dengan teknologi GPS, SnapCheck memastikan keakuratan lokasi pengguna saat melakukan absensi, sehingga meminimalkan kecurangan dan meningkatkan transparansi. </p>
          <p class="mb-4 text-white">Visi kami adalah menjadi solusi utama dalam manajemen kehadiran digital yang akurat dan efisien, serta mendukung peningkatan produktivitas dan transparansi dalam berbagai organisasi. Misi kami adalah menyediakan platform absensi online berbasis GPS yang handal dan mudah digunakan</p>
      </div>
      <div class="grid grid-cols-2 gap-4 mt-8">
          <img style=" filter: grayscale(100%)" class="w-full rounded-lg" src="img/assets/foto-about-landing1.jpg" alt="office content 1"data-aos="fade-down">
          <img class="mt-4 w-full lg:mt-10 rounded-lg" src="img/assets/foto-about-landing2.jpg" alt="office content 2" data-aos="fade-up">
      </div>
  </div>
</section>
{{-- end of about section --}}


{{-- why choose us section --}}
<div class="bg-black">
  <section id="manfaat" class="relative block px-6 py-10 md:py-20 md:px-10 border-t border-b border-neutral-900 bg-neutral-900/30">
    <div class="relative mx-auto max-w-5xl text-center" data-aos="zoom-out-up">
      <span class="text-gray-400 my-3 flex items-center justify-center font-medium uppercase tracking-wider">
        Mengapa Memilih Kami
      </span>
      <h2 class="py-4 block w-full bg-gradient-to-b from-white to-gray-400 bg-clip-text font-bold text-transparent text-3xl sm:text-4xl">
        Platform Dengan Beragam Manfaat Untuk Anda
      </h2>
      <p class="mx-auto my-4 w-full max-w-xl bg-transparent text-center font-medium leading-relaxed tracking-wide text-gray-400">
        Kami menyediakan berbagai manfaat memudahkan Anda untuk mengatur presensi secara efektif dan efisien. 
      </p>
    </div>

    <div class="relative mx-auto max-w-7xl z-10 flex sm:flex-col gap-10 pt-14 md:flex-row sm:flex-wrap">
      <div class="w-full sm:w-auto sm:flex-1 rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow" data-aos="zoom-in">
        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-md border bg-gradient-to-r from-indigo-600 to-blue-600 border-indigo-700">
          <img src="img/assets/icons/easy-icon.png" class="icon w-8 h-8">
        </div>
        <h3 class="mt-6 text-gray-400">Kemudahan Penggunaan</h3>
        <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
          Dirancang dengan antarmuka yang intuitif dan sederhana untuk dapat digunakan dengan mudah oleh siapa pun, tanpa memerlukan pelatihan khusus.
        </p>
      </div>
      
      <div class="w-full sm:w-auto sm:flex-1 rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow" data-aos="zoom-in" data-aos-delay="150">
        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-md border bg-gradient-to-r from-indigo-600 to-blue-600 border-indigo-700">
          <img src="img/assets/icons/time-icon2.png" class="icon w-8 h-8">
        </div>
        <h3 class="mt-6 text-gray-400">Fleksibilitas Dan Efisiensi</h3>
        <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
          Belajar kapan saja dan di mana saja dengan fleksibilitas penuh memungkinkan Anda belajar sesuai jadwal Anda sendiri.
        </p>
      </div>
      
      <div class="w-full sm:w-auto sm:flex-1 rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow" data-aos="zoom-in" data-aos-delay="250">
        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-md border bg-gradient-to-r from-indigo-600 to-blue-600 border-indigo-700">
          <img src="img/assets/icons/safety-icon.png" class="icon w-8 h-8">
        </div>
        <h3 class="mt-6 text-gray-400">Akurasi Data dan Keamanan</h3>
        <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
          Sistem kami dirancang dengan teknologi enkripsi canggih yang menjaga privasi dan keamanan data Anda. 
        </p>
      </div>
    </div>
    <div class="absolute bottom-0 left-0 z-0 h-1/3 w-full border-b" style="background-image: linear-gradient(to right top, rgba(79, 70, 229, 0.2) 0%, transparent 50%, transparent 100%); border-color: rgba(92, 79, 240, 0.2);"></div>
    <div class="absolute bottom-0 right-0 z-0 h-1/3 w-full" style="background-image: linear-gradient(to left top, rgba(89, 16, 207, 0.2) 0%, transparent 50%, transparent 100%); border-color: rgba(92, 79, 240, 0.2);"></div>
  </section>
</div>
{{-- end of why choose us section --}}

{{-- learning path section --}}
<section id="fitur" class="relative px-6 py-10 md:py-20 md:px-10 flex justify-center flex-col">
  <div class="relative mx-auto max-w-5xl text-center" data-aos="zoom-in">
    <span class="text-gray-400 my-3 flex items-center justify-center font-medium uppercase tracking-wider">
    Fitur Unggulan
    </span>
    <h2
        class="pb-1 block w-full bg-gradient-to-b from-white to-gray-400 bg-clip-text font-bold text-transparent text-3xl sm:text-4xl">
        Bangun Karirmu Dengan Platform Absensi Kami
    </h2>
    <p
        class="mx-auto my-4 w-full max-w-xl bg-transparent text-center font-medium leading-relaxed tracking-wide text-gray-400">
        Fitur yang akan mempermudah anda dalam berkarir di dunia nyata dengan platform absensi yang dibangun dengan standar industri modern.
    </p>
  </div>
  <div class="wrapper max-w-[1100px] w-full relative mx-auto my-8">
    <i id="left" class="z-10 fa-solid fa-angle-left top-1/2 h-[50px] w-[50px] cursor-pointer text-lg absolute text-center leading-[50px] bg-white text-black rounded-full shadow-md transform -translate-y-1/2 transition-transform duration-100 left-[-22px] active:scale-85" style="display: flex; justify-content: center; align-items: center;">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
      </svg>
      
    </i>
    
    <ul class="carousel">
      <li class="card flex flex-col items-center  " style="background-image: url('img/assets/easy-use.jpg');  background-position: center;  background-size: cover;"> 
        <h2 class="font-medium text-[1.56rem] my-[30px] text-white text-xl  text-shadow-sm z-[2]">UI Mudah Dipahami</h2>
       
      </li>
      <li class="card flex flex-col items-center" style="background-image: url('img/assets/topviegps.jpg');  background-position: center;  background-size: cover;">
        <h2 class="font-medium text-[1.56rem] my-[30px] text-white text-xl  text-shadow-sm z-[2]">Sistem Tracking Location</h2>
       
      </li>
      <li class="card flex flex-col items-center" style="background-image: url('img/assets/scheduling.jpg');  background-position: center;  background-size: cover;">
        
        <h2 class="font-medium text-[1.56rem] my-[30px] text-white text-xl  text-shadow-sm z-[2]">Penjadwalan Absensi</h2>
       
      </li>
      <li class="card flex flex-col items-center" style="background-image: url('img/assets/group-people.jpg');  background-position: center;  background-size: cover;">
       
        <h2 class="font-medium text-[1.56rem] my-[30px] text-white text-xl  text-shadow-sm z-[2]">Sistem Room</h2>
       
      </li>
      <li class="card flex flex-col items-center" style="background-image: url('img/assets/checking-people.jpg');  background-position: center;  background-size: cover;">
       
        <h2 class="font-medium text-[1.56rem] my-[30px] text-white text-xl  text-shadow-sm z-[2]">Pengecekan Mudah</h2>
      
      </li>
    
    </ul>
    <i id="right" class="z-10 fa-solid fa-angle-right top-1/2 h-[50px] w-[50px] cursor-pointer text-lg absolute text-center leading-[50px] bg-white rounded-full shadow-md transform -translate-y-1/2 transition-transform duration-100 right-[-22px] active:scale-85" style="display: flex; justify-content: center; align-items: center;">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
      </svg>
       
    </i>
    
  </div>
</section>
{{-- akhir learning path section --}}

{{-- OUR Partner --}}
{{-- OUR Partner --}}
<section class="bg-gray-800 py-16">
  <div class=" mx-auto px-6 ">
      <div class="relative mx-auto max-w-5xl text-center" data-aos="zoom-in">
          <span class="text-gray-400 my-3 flex items-center justify-center font-medium uppercase tracking-wider">
              Our Partners
          </span>
          <h2 class="pb-1 block w-full bg-gradient-to-b from-white to-gray-400 bg-clip-text font-bold text-transparent text-3xl sm:text-4xl">
              Bersama Mitra Kepercayaan Kami Yang Profesional
          </h2>
          <p class="mx-auto my-4 w-full max-w-xl bg-transparent text-center font-medium leading-relaxed tracking-wide text-gray-400">
              Kami bangga berkolaborasi dengan berbagai mitra terpercaya yang mendukung perjalanan kami dalam memberikan solusi terbaik untuk Anda.
          </p>
      </div>
      <div class="flex justify-center gap-6 items-center mt-10">
          <!-- Partner 2 -->
          <div class="p-4 rounded-lg  flex justify-center items-center">
            <img src="{{ asset('img/logo/primsky store.png') }}" alt="Partner 1" class="h-28 w-auto object-contain">
          </div>
          <!-- Partner 1 -->
          <div class="p-4 flex justify-center items-center">
            <img src="{{ asset('img/logo/iftech logo.png') }}" alt="Partner 1" class="h-28 w-auto object-contain">
          </div>
      </div>
  </div>
</section>





{{-- FAQ Section --}}
<div id="faq" class="bg-gray-700">
  <section class="max-w-5xl mx-auto py-10 sm:py-20">
    <div class="flex items-center justify-center flex-col gap-y-2 py-5" data-aos="fade-up">
      <h1 class="text-gray-400 my-3 flex items-center justify-center font-medium uppercase tracking-wider text-lg">
        Frequently Asked Question
      </h1>
    </div>
    <div class="w-full px-7 md:px-10 xl:px-2 py-4" data-aos="zoom-in">
      <div class="mx-auto w-full max-w-5xl border border-slate-400/20 rounded-lg glass-bg">
        <div class="border-b border-[#0A071B]/10">
          <button class="question-btn flex w-full items-start gap-x-5 justify-between rounded-lg text-left text-lg font-bold text-white focus:outline-none p-5" data-toggle="answer-1">
            <span class="question-text">Apa itu snapcheck?</span>
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="mt-1.5 md:mt-0 flex-shrink-0 transform h-5 w-5 icon-white" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path>
            </svg>
          </button>
          <div class="answer pt-2 pb-5 px-5 text-sm lg:text-base text-slate-300 font-medium" id="answer-1" style="display: none;">
            SnapCheck adalah aplikasi absensi online berbasis GPS yang dirancang untuk memudahkan proses kehadiran bagi berbagai jenis organisasi dan perusahaan.
          </div>
        </div>
        <div class="border-b border-[#0A071B]/10">
          <button class="question-btn flex w-full items-start gap-x-5 justify-between rounded-lg text-left text-lg font-bold text-white focus:outline-none p-5" data-toggle="answer-2">
            <span class="question-text">Bagaimana membuat penjadwalan absensi?</span>
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="mt-1.5 md:mt-0 flex-shrink-0 transform h-5 w-5 icon-white" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path>
            </svg>
          </button>
          <div class="answer pt-2 pb-5 px-5 text-sm lg:text-base text-slate-300 font-medium" id="answer-2" style="display: none;">
           Untuk membuat penjadwalan, pengguna hanya perlu membuat room sendiri agar bisa menambah penjadwalan
          </div>
        </div>
        <div class="border-b border-[#0A071B]/10">
          <button class="question-btn flex w-full items-start gap-x-5 justify-between rounded-lg text-left text-lg font-bold text-white focus:outline-none p-5" data-toggle="answer-3">
            <span class="question-text">Bagaimana menambah anggota room untuk absensi?</span>
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="mt-1.5 md:mt-0 flex-shrink-0 transform h-5 w-5 icon-white" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path>
            </svg>
          </button>
          <div class="answer pt-2 pb-5 px-5 text-sm lg:text-base text-slate-300 font-medium" id="answer-3" style="display: none;">
            Dengan mencari kode share pada room lalu bagikan ke orang lain untuk agar orang tersebut dapat join
          </div>
        </div>
        <div>
          <button class="question-btn flex w-full items-start gap-x-5 justify-between rounded-lg text-left text-lg font-bold text-white focus:outline-none p-5" data-toggle="answer-4">
            <span class="question-text">Apakah dapat mengambil lebih dari satu room?</span>
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="mt-1.5 md:mt-0 flex-shrink-0 transform h-5 w-5 icon-white" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path>
            </svg>
          </button>
          <div class="answer pt-2 pb-5 px-5 text-sm lg:text-base text-slate-300 font-medium" id="answer-4" style="display: none;">
            Ya, pengguna dapat mengambil lebih dari satu room dengan melakukan join menggunakan share code atau membuat room sendiri
          </div>
        </div>
      </div>
    </div>
  </section>


</div>
{{-- End FAQ Section --}}

  {{-- closing section --}}
  <section  id="closing" class="py-20 text-white bg-gray-700">
    <div class="container mx-auto text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl font-bold mb-4">Mari Mulai Langkahmu Demi Karirmu</h2>
        <p class="text-lg mb-8">Mulailah absensi di snapcheck demi karirmu yang lebih cerah untuk kedepanya</p>
        <a href="{{ route('show-dashboard') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Get Started</a>
    </div>
  </section>
  {{-- end closing section --}}
@endsection
