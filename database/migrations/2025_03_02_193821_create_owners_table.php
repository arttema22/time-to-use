<?php

use App\Models\Owner;
use App\Models\OwnerRole;
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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('owner_role_id')
                ->default(1)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('email', 190)->unique();
            $table->string('password');
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('remember_token', 100)->nullable();
        });

        Owner::create([
            'owner_role_id' => 1,
            'email' => 'arttema@mail.ru',
            'password' => bcrypt('1234qwerQWER'),
            'name' => 'Artem',
        ]);

        Owner::create([
            'owner_role_id' => 1,
            'email' => 'test@test.ru',
            'password' => bcrypt('1234qwerQWER'),
            'name' => 'Test',
        ]);
        Owner::create([
            'owner_role_id' => 1,
            'email' => 'test2@test2.ru',
            'password' => bcrypt('1234qwerQWER'),
            'name' => 'Test 2
            ',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
