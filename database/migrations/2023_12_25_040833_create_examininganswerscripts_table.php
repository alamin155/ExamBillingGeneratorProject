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
        Schema::create('examininganswerscripts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('noscript');
            $table->unsignedBigInteger('internal_id'); // Foreign key column
            $table->unsignedBigInteger('external_id');
            $table->unsignedBigInteger('cous_id');
            $table->unsignedBigInteger('exam_id');
            $table->foreign('internal_id')->references('id')->on('questionpaperinternals')->onDelete('cascade');
           // $table->integer('deg_id'); // Foreign key column
            $table->foreign('external_id')->references('id')->on('questionpapersetterexternals')->onDelete('cascade');
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
        Schema::dropIfExists('examininganswerscripts');
    }
};
