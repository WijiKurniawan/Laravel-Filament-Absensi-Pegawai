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
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->double('schedule_latitude');    // Latitude lokasi yang dijadwalkan
            $table->double('schedule_longitude');   // Longitude lokasi yang dijadwalkan
            $table->time('schedule_start_time');   // Waktu mulai yang dijadwalkan
            $table->time('schedule_end_time');     // Waktu selesai yang dijadwalkan
            $table->double('latitude');             // Latitude lokasi aktual absen
            $table->double('longitude');            // Longitude lokasi aktual absen
            $table->time('start_time');             // Waktu aktual mulai kerja
            $table->time('end_time');               // Waktu aktual selesai kerja
            $table->timestamps();
            $table->softDeletes();
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
