<?php

use App\Models\Admin\Celebrity;
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
        Schema::create('squares', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Celebrity::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();


            $table->integer('extra_number_one');
            $table->integer('extra_number_two');
            $table->integer('extra_number_three');
            $table->integer('extra_number_four');

            $table->integer('number_one');
            $table->integer('number_four');
            $table->integer('number_seven');
            $table->integer('number_two');
            $table->integer('number_five');
            $table->integer('number_eight');
            $table->integer('number_three');
            $table->integer('number_six');
            $table->integer('number_nine');

            $table->integer('goal');
            $table->integer('family');
            $table->integer('habits');
            $table->integer('self_esteem');
            $table->integer('everyday_life');
            $table->integer('talents');
            $table->integer('spirituality');
            $table->integer('temperament');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('squares');
    }
};