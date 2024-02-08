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
        Schema::create('exambillings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('semester');
            $table->integer('year');
            $table->string('exam_year', 4);
            $table->string('addmission_year');
            $table->string('academic_year');
            $table->date('exam_start_date');
            $table->date('exam_end_date');
            $table->integer('staff_status');
            $table->unsignedBigInteger('dept_id'); // Foreign key column
            $table->unsignedBigInteger('deg_id');
            $table->foreign('dept_id')->references('id')->on('departments')->onDelete('cascade');
           // $table->integer('deg_id'); // Foreign key column
            $table->foreign('deg_id')->references('id')->on('degrees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exambillings');
    }
};
