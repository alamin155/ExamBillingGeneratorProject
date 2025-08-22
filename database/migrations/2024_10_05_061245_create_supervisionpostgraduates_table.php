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
        Schema::create('supervisionpostgraduates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('numberofstudent');
            $table->unsignedBigInteger('tech_id');
            $table->unsignedBigInteger('exam_id');
            $table->unique(['tech_id', 'exam_id']);
            $table->foreign('tech_id')->references('id')->on('teachers')->onDelete('cascade');
           // $table->integer('deg_id'); // Foreign key column
            $table->foreign('exam_id')->references('id')->on('exambillings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supervisionpostgraduates');
    }
};
