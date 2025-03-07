<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use MoonShine\Laravel\Models\MoonshineUserRole;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('moonshine_user_roles', static function (Blueprint $table): void {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        DB::table('moonshine_user_roles')->insert([
            'id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'name' => 'Admin',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moonshine_user_roles');
    }
};
