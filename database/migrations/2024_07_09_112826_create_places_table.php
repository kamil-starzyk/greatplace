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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->json('photos')->nullable();
            $table->string('place_name');
            $table->string('selected_voivodeship');
            $table->string('selected_district');
            $table->string('selected_locality');
            $table->string('street_address');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('ease_of_access');
            $table->text('description');
            $table->json('tags');
            $table->json('best_seasons');
            $table->decimal('price', 8, 2);
            $table->string('price_for');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
