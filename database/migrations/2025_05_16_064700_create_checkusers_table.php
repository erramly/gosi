<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checkusers', function (Blueprint $table) {
            $table->id();
            $table->string('national_id')->unique();
            $table->string('serial_number');
            $table->string('pdf_path_original')->nullable();
            $table->string('pdf_path_qr')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkusers');
    }
};
