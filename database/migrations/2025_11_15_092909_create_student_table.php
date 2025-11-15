<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20)->unique();
            $table->string('name', 100);
            $table->enum('gender', ['P', 'L']);
            $table->string('domisili', 100);
            $table->year('angkatan');
            $table->string('prodi', 100);
            $table->string('fakultas', 100);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
