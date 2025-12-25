<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('icon')->nullable(); // Lucide icon keyword (e.g., 'layers')
            $table->string('color')->nullable(); // Text color class (e.g., 'text-red-500')
            $table->string('bg_color')->nullable(); // Background color class (e.g., 'bg-red-500')
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};