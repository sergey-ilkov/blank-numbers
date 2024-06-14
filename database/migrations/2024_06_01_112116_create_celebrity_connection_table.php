<?php

use App\Models\Admin\Celebrity;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('celebrity_connection', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('celebrity_id');
            $table->unsignedBigInteger('connection_id');

            $table->foreign('celebrity_id')->references('id')->on('celebrities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('connection_id')->references('id')->on('celebrities')->onUpdate('cascade')->onDelete('cascade');

            // $table->foreignId('celebrity_id')
            //     ->constrained('celebrities', 'celebrity_id')
            //     ->cascadeOnDelete()
            //     ->cascadeOnUpdate();
            // $table->foreignId('celebrity_id')
            //     ->constrained('celebrities', 'connection_id')
            //     ->cascadeOnDelete()
            //     ->cascadeOnUpdate();

            // $table->foreignIdFor(Celebrity::class)
            //     ->constrained()
            //     ->cascadeOnDelete()
            //     ->cascadeOnUpdate();

            // $table->foreignIdFor(Celebrity::class)
            //     ->constrained()
            //     ->cascadeOnDelete()
            //     ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('celebrity_connection');
    }
};
