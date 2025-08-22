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
        Schema::create('rateofremunerationforexaminationworks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('details');
            $table->text('name');
            $table->decimal('amountofmoney', 12, 2);
            $table->unsignedBigInteger('exam_id');
            $table->foreign('exam_id')->references('id')->on('exambillings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rateofremunerationforexaminationworks');
    }
};
