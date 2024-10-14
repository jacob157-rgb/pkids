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
        Schema::create('selling_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sellings_id');
            $table->unsignedBigInteger('products_id');
            $table->integer('selling_point');
            $table->integer('qty');
            $table->integer('sub_total');
            $table->timestamps();

            $table->foreign('sellings_id')->references('id')->on('sellings')->onDelete('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selling_details');
    }
};
