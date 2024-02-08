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
        Schema::create('examinationcommittees', function (Blueprint $table) {
            $table->increments('examinationcommittee_id');
            $table->string('examinationcommittee_sl');
            $table->string('examinationcommittee_name');
            $table->string('examinationcommittee_designation');
            $table->string('examinationcommittee_address');
            $table->string('examinationcommittee_remark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examinationcommittees');
    }
};
