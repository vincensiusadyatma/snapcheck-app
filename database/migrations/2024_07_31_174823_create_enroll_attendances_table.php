<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enroll_attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID pengguna
            $table->unsignedBigInteger('attendance_id'); // ID kehadiran
            $table->dateTime('check_in_time'); // Waktu check-in
            $table->string('latitude')->nullable(); // Lokasi check-in
            $table->string('longitude')->nullable();
            $table->string('photo'); // Foto saat check-in
            $table->string('device_info')->nullable();
            $table->string('os_info')->nullable();
            $table->string('ip_address')->nullable();
            
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('attendance_id')->references('id')->on('attendances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enroll_attendances');
    }
};
