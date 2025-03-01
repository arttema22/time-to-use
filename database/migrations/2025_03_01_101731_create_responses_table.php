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
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('request_id')->index();
            $table->string('status_response')->nullable();
            $table->dateTime('date_time_response')->nullable();
            $table->integer('qnty_approved')->nullable();
            $table->foreignId('vehicle_id')->index();
            $table->foreignId('price_list_id')->index();
            $table->foreignId('pier_id')->index();
            $table->date('response_date_from')->nullable();
            $table->date('response_date_to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
