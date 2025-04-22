<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('feeders', function (Blueprint $table) {
        $table->id();
        $table->string('pet_name');
        $table->string('food_type');
        $table->integer('quantity'); // in grams
        $table->timestamp('scheduled_time');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feeder');
    }
};
