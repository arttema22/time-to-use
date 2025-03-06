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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            //  $table->foreignId('user_id')->index();
            $table->boolean('flag_activity')->default(1);
            $table->dateTime('date_time_order');
            $table->integer('qnty_places')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->decimal('latitude', 9, 6)->nullable();
            $table->decimal('longitude', 9, 6)->nullable();
            $table->string('url_yandex_map')->nullable();
            $table->text('comment')->nullable();
            $table->string('colour')->nullable();
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('speed')->nullable();
            $table->integer('qnty_siutes')->nullable();
            $table->integer('qnty_toilets')->nullable();
            $table->boolean('flag_captain')->nullable();
            $table->boolean('flag_shower')->nullable();
            $table->boolean('flag_fridge')->nullable();
            $table->boolean('flag_kitchen')->nullable();
            $table->boolean('flag_audio')->nullable();
            $table->boolean('flag_tv')->nullable();
            $table->boolean('flag_open_deck')->nullable();
            $table->boolean('flag_flybridge')->nullable();
            $table->string('status_order')->nullable();
            $table->integer('qnty_ordered')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
