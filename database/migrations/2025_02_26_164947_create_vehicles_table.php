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
            $table->integer('qnty_places');
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->boolean('flag_activity');
            $table->string('attribute1')->nullable();
            $table->string('attribute2')->nullable();
            $table->string('attribute3')->nullable();
            $table->string('description')->nullable();
            $table->string('license_plate')->nullable();
            $table->integer('qnty_siutes');
            $table->integer('qnty_toilets');
            $table->string('colour')->nullable();
            $table->integer('length');
            $table->integer('width');
            $table->integer('speed');
            $table->boolean('flag_captain');
            $table->boolean('flag_shower');
            $table->boolean('flag_fridge');
            $table->boolean('flag_kitchen');
            $table->boolean('flag_audio');
            $table->boolean('flag_tv');
            $table->boolean('flag_open_deck');
            $table->boolean('flag_flybridge');
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
