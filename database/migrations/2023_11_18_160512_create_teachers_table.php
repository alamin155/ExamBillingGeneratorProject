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
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('teacher_name');
            $table->string('teacher_designation');
            $table->string('teacher_address');
            $table->string('teacher_image');
            $table->string('teacher_type');
            $table->integer('teacher_status');
            $table->unsignedBigInteger('dept_id'); // Foreign key column
            $table->foreign('dept_id')->references('id')->on('departments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
