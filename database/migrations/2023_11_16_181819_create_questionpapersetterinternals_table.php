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
        Schema::create('questionpapersetterinternals', function (Blueprint $table) {
            $table->increments('questionpapersetterinternal_id');
            $table->string('questionpapersetterinternal_sl');
            $table->string('questionpapersetterinternal_coursecode');
            $table->string('questionpapersetterinternal_quantity');
            $table->string('questionpapersetterinternal_name');
            $table->string('questionpapersetterinternal_designation');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionpapersetterinternals');
    }
};
