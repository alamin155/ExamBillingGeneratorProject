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
        Schema::create('questiontypingpublishings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('numberofquestion');
            $table->bigInteger('numberofpage');
            $table->unsignedBigInteger('tech_id'); 
            $table->unsignedBigInteger('exam_id'); // unique() বাদ দিতে হবে

            // Foreign Keys
            $table->foreign('tech_id')
                  ->references('id')
                  ->on('teachers')
                  ->onDelete('cascade');

            $table->foreign('exam_id')
                  ->references('id')
                  ->on('exambillings')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questiontypingpublishings');
    }
};
