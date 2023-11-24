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
        Schema::create('flogs_foods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('foods_id');
            $table->unsignedBigInteger('flogs_id');
            $table->string('cantidad');
            $table->timestamps();

            $table->foreign('foods_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreign('flogs_id')->references('id')->on('flogs')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flogs_foods');
    }
};
