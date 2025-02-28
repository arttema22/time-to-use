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
            $table->string('description')->nullable();
            $table->string('code_type_category')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->string('comment')->nullable();
            $table->string('attribute1')->nullable();
            $table->string('attribute2')->nullable();
            $table->string('attribute3')->nullable();
            $table->boolean('flag_activity')->default(0);
        });

        Category::create([
            'name' => 'Катер',
            'flag_activity' => '1',
        ]);
        Category::create([
            'name' => 'Большое судно',
            'flag_activity' => '1',
        ]);
        Category::create([
            'name' => 'Водный мотоцикл',
            'flag_activity' => '1',
        ]);
        Category::create([
            'name' => 'Парусная яхта',
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
