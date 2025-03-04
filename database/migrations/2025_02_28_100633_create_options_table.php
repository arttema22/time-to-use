<?php

use App\Models\Option;
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
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
            $table->string('description')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->string('attribute1')->nullable();
            $table->string('attribute2')->nullable();
            $table->string('attribute3')->nullable();
            $table->boolean('flag_activity');
        });

        Option::create([
            'name' => 'Мангал',
            'description' => 'На 10 шомпуров, на ножках.',
            'flag_activity' => '1',
        ]);

        Option::create([
            'name' => 'Плед',
            'description' => 'На случай холодной погоды поможет плед.',
            'flag_activity' => '1',
        ]);

        Option::create([
            'name' => 'Зонт',
            'description' => 'На случай дождя.',
            'flag_activity' => '1',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};
