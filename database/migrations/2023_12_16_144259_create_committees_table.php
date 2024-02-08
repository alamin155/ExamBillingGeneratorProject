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
        Schema::create('committees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('designation');
            $table->string('department');
            $table->string('address');
            $table->unsignedBigInteger('tech_id'); // Foreign key column
            $table->unsignedBigInteger('remk_id');
            $table->unsignedBigInteger('exam_id');
            $table->foreign('tech_id')->references('id')->on('teachers')->onDelete('cascade');
           // $table->integer('deg_id'); // Foreign key column
            $table->foreign('remk_id')->references('id')->on('remarks')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exambillings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('committees');
    }
};
