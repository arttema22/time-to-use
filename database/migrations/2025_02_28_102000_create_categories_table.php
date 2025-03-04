<?php

use App\Models\Category;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('parent_id')->index()->default(0);
            $table->integer('sorting')->default(0);
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('code_type_category')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->text('comment')->nullable();
            $table->string('attribute1')->nullable();
            $table->string('attribute2')->nullable();
            $table->string('attribute3')->nullable();
            $table->boolean('flag_activity')->default(0);
        });

        Category::create([
            'name' => 'Водный транспорт',
            'flag_activity' => '1',
        ]);
        Category::create([
            'name' => 'Моторное судно',
            'parent_id' => 1,
            'sorting' => 2,
            'flag_activity' => '1',
        ]);
        Category::create([
            'name' => 'Катер',
            'parent_id' => 1,
            'sorting' => 0,
            'flag_activity' => '1',
        ]);
        Category::create([
            'name' => 'Парусная яхта',
            'parent_id' => 1,
            'sorting' => 1,
            'flag_activity' => '1',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
