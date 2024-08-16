<div align="center">
    <img alt="Demo" src="public/img/logo/snapcheck logo.png" style="width:30%">
</div>



# SnapCheck

SnapCheck adalah aplikasi absensi online yang memungkinkan pengguna untuk melakukan absensi dengan fitur pelacakan lokasi secara real-time. Aplikasi ini dirancang untuk memudahkan manajemen kehadiran dalam berbagai aktivitas, seperti pertemuan, kelas, atau kegiatan lainnya, dengan dukungan teknologi terkini.

## Fitur Utama

- **Tracking Location**: SnapCheck memanfaatkan teknologi GPS untuk melacak lokasi pengguna saat melakukan absensi, memastikan kehadiran dilakukan di lokasi yang tepat.
- **Manajemen Room**: Pengguna dapat membuat dan mengelola room untuk berbagai kegiatan. Setiap room memiliki kode unik yang digunakan untuk absensi.
- **Absensi Real-Time**: Data absensi diperbarui secara langsung dan dapat diakses melalui dashboard, memberikan visibilitas penuh kepada admin dan pengguna.
- **Dashboard Interaktif**: Menyediakan tampilan yang user-friendly dengan statistik dan progress pengguna, termasuk daftar absensi yang diorganisir dalam bentuk tabel.

## Teknologi yang Digunakan

- **Laravel 11**: Framework PHP yang digunakan untuk mengembangkan backend aplikasi ini, menyediakan API dan fitur manajemen data.
- **MariaDB**: Database yang digunakan untuk menyimpan data absensi, pengguna, dan room.
- **XAMPP**: Platform pengembangan yang digunakan untuk menjalankan server aplikasi selama pengembangan.
- **Leaflet JS**: Library JavaScript open-source yang digunakan untuk memetakan dan melacak lokasi pengguna dalam aplikasi.
- **Tailwind CSS**: Framework CSS yang digunakan untuk mendesain antarmuka pengguna yang responsif dan menarik.
- **JavaScript Biasa**: Digunakan untuk menambah interaktivitas pada halaman web dan mengelola logika frontend.

## Cara Menggunakan

1. **Kloning Repositori**  
   ```bash
   git clone https://github.com/username/snapcheck.git
   cd snapcheck
2. **Instalasi Dependencies**  
   ```bash
   composer install
   npm install

3. **Konfigurasi Environment**  
   ```bash
   cp .env.example .env
   php artisan key:generate

3. **Menjalankan Aplikasi ( Terminal 1 )**  
   ```bash
   php artisan serve

4. **Menjalankan Aplikasi ( Terminal 2 )**  
   ```bash
   npm run dev


<br>
<h2 align="center">Our Partners</h2>

<div align="center">
    <img alt="Company 1" src="public/img/logo/iftech logo.png" style="width:45%; margin-right:30px;">
    <img alt="Company 2" src="public/img/logo/primsky store.png" style="width:25%; margin-left:100px;">
</div>
