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
        Schema::create('celebrities', function (Blueprint $table) {
            $table->id();

            $table->string('name_uk');
            $table->string('surname_uk');
            $table->string('gender_uk');
            $table->text('description_uk');
            $table->string('name_ru');
            $table->string('surname_ru');
            $table->string('gender_ru');
            $table->text('description_ru');

            $table->integer('day');
            $table->integer('month');
            $table->integer('year');
            $table->boolean('published')->default(false);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('celebrities');
    }
};