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
        Schema::create('ledgers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->enum('type', ['tu','att','pur']);
            //tu = Top Up, att = Attendance(Absen), pur = Purchasing(Pembelian)
            $table->unsignedBigInteger('kids_id');
            $table->string('ref_id');
            $table->integer('transaction_points');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kids_id')->references('id')->on('kids')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ledgers');
    }
};
