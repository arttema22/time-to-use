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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('owner_id')->index();
            $table->string('name');
            $table->json('photo')->nullable();
            $table->integer('qnty_places');
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->boolean('flag_activity')->default(0);
            $table->string('attribute1')->nullable();
            $table->string('attribute2')->nullable();
            $table->string('attribute3')->nullable();
            $table->text('description')->nullable();
            $table->string('license_plate')->nullable();
            $table->integer('qnty_siutes')->nullable();
            $table->integer('qnty_toilets')->nullable();
            $table->string('colour')->nullable();
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('speed')->nullable();
            $table->boolean('flag_captain')->nullable();
            $table->boolean('flag_shower')->nullable();
            $table->boolean('flag_fridge')->nullable();
            $table->boolean('flag_kitchen')->nullable();
            $table->boolean('flag_audio')->nullable();
            $table->boolean('flag_tv')->nullable();
            $table->boolean('flag_open_deck')->nullable();
            $table->boolean('flag_flybridge')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
