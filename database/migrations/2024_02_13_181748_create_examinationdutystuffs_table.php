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
        Schema::create('examinationdutystuffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('numberofexam');
            $table->BigInteger('examdutycarriedout');
            $table->unsignedBigInteger('staf_id');
            $table->unsignedBigInteger('exam_id');
            //$table->unique(['staf_id', 'exam_id']);
            $table->decimal('hours', 8, 2);
            $table->foreign('staf_id')->references('id')->on('staffs')->onDelete('cascade');
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
        Schema::dropIfExists('examinationdutystuffs');
    }
};
