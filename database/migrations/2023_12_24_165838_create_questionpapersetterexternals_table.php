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
        Schema::create('questionpapersetterexternals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('designation');
            $table->string('department');
            $table->string('address');
            $table->unsignedBigInteger('etech_id'); // Foreign key column
            $table->unsignedBigInteger('cous_id');
            $table->unsignedBigInteger('exam_id');
            $table->foreign('etech_id')->references('id')->on('externalteachers')->onDelete('cascade');
           // $table->integer('deg_id'); // Foreign key column
            $table->foreign('cous_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exambillings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionpapersetterexternals');
    }
};
