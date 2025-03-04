<?php

use App\Models\Piers;
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
        Schema::create('piers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('latitude', 9, 6)->nullable();
            $table->decimal('longitude', 9, 6)->nullable();
            $table->string('url_yandex_map')->nullable();
            $table->string('attribute1')->nullable();
            $table->string('attribute2')->nullable();
            $table->string('attribute3')->nullable();
            $table->boolean('flag_activity')->default(0);
        });

        Piers::create([
            'name' => 'Ушаковский мост',
            'flag_activity' => '1',
        ]);

        Piers::create([
            'name' => 'Выборгская набережная 61',
            'flag_activity' => '1',
        ]);

        Piers::create([
            'name' => 'Аптекарская набережная 8',
            'flag_activity' => '1',
        ]);

        Piers::create([
            'name' => 'Дворцовая набережная 5',
            'flag_activity' => '1',
        ]);

        Piers::create([
            'name' => 'Набережная реки Мойки 78',
            'flag_activity' => '1',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piers');
    }
};
