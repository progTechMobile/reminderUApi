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
        Schema::create('teacher_ratings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('observation')->nullable();
            $table->float('score');
            $table->unsignedBigInteger('subject_id');
            $table->string('email')->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_ratings');
    }
};
