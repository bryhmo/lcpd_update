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
        Schema::create('new_users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('gender');
            $table->string('nationality');
            $table->string('email')->unique();
            $table->string('phone');
            $table->text('address');
            $table->string('kin_name');
            $table->string('kin_relationship');
            $table->string('kin_phone');
            $table->text('kin_address');
            $table->string('undergrad_degree');
            $table->string('university');
            $table->year('grad_year');
            $table->float('gpa', 3, 2);
            $table->text('experience')->nullable();
            $table->string('certificate')->nullable();
            $table->string('program');
            $table->string('intake');
            $table->text('statement');
            $table->boolean('admitted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_users');
    }
};
