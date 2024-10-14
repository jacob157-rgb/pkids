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
        Schema::create('kids', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birth');
            $table->enum('gender', ['L', 'P']);
            $table->string('profile')->nullable();
            $table->string('kids_phone_number', 15)->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_phone_number', 15)->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_phone_number', 15)->nullable();
            $table->enum('status', ['active','inactive','graduated'])->default('active');
            $table->string('class');
            $table->string('qrid')->unique();
            $table->integer('current_point')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kids');
    }
};
