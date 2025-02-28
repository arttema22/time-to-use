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
        Schema::create('piers_vehicle', function (Blueprint $table) {
            $table->foreignId('vehicle_id')->index();
            $table->foreignId('piers_id')->index();
            $table->boolean('flag_current_pier')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piers_vehicle');
    }
};
