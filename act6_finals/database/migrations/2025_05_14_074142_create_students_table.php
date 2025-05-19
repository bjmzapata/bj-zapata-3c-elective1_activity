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
        Schema::create('students', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->integer('age'); 
    $table->date('bday');
    $table->enum('gender', ['male', 'female']); 
    $table->timestamps();
});

Schema::create('infos', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('student_id');
    $table->string('course');
    $table->string('photo'); 
    $table->enum('year', ['1st', '2nd', '3rd', '4th']); 
    $table->timestamps();

    $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('students');
       Schema::dropIfExists('infos');
    }
};
