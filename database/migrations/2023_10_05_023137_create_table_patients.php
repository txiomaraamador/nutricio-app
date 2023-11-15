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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('code', 8);
            $table->enum('sex', ['hombre', 'mujer', 'otro']);
            $table->unsignedBigInteger('user_id');
 	        $table->string('lastname');
            $table->decimal('weight',5,2);
            $table->float('height');
            $table->integer('age');
            $table->string('avatar');
            $table->date('date_of_birth');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
