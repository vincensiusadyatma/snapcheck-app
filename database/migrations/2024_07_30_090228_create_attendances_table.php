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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama kehadiran (misalnya, nama event atau pertemuan)
            $table->text('description')->nullable(); // Deskripsi kehadiran
            $table->dateTime('start_time'); // Waktu mulai kehadiran
            $table->dateTime('end_time'); // Waktu selesai kehadiran
            $table->unsignedBigInteger('room_id');
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
