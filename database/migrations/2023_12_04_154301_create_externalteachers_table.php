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
        Schema::create('externalteachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('designation');
            $table->string('address');
            $table->string('mobile');
            $table->string('email');
            $table->string('bankaccount');
            $table->string('bankname');
            $table->integer('status');
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
        Schema::dropIfExists('externalteachers');
    }
};
