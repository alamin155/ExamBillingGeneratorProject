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
        Schema::create('moderationcommittees', function (Blueprint $table) {
            $table->increments('moderationcommittee_id');
            $table->string('moderationcommittee_sl');
            $table->string('moderationcommittee_name');
            $table->string('moderationcommittee_designation');
            $table->string('moderationcommittee_address');
            $table->string('moderationcommittee_remark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moderationcommittees');
    }
};
