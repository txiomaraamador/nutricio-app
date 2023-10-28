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
        Schema::create('flogs', function (Blueprint $table) {
            $table->id();
            $table->string('type', 100);
            $table->text('content');
            $table->unsignedBigInteger('patient_id');
	        $table->date('date');
            $table->time('hour');
            $table->timestamps();
            
            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flogs');
    }
};
