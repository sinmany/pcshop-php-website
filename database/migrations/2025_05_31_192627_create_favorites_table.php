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
        Schema::create('tblfavourite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('favouritable_id');
            $table->string('favouritable_type'); // polymorphic: 'tblcomputer' or 'tblaccessary'
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('tbluser')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblfavourite');
    }
};
