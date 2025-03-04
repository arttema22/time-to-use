<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use MoonShine\Laravel\Models\MoonshineUserRole;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('moonshine_users', static function (Blueprint $table): void {
            $table->id();
            $table->timestamps();

            $table->foreignId('moonshine_user_role_id')
                ->default(MoonshineUserRole::DEFAULT_ROLE_ID)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('email', 190)->unique();
            $table->string('password');
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('remember_token', 100)->nullable();
        });

        DB::table('moonshine_users')->insert([
            'id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'moonshine_user_role_id' => 1,
            'email' => 'arttema@mail.ru',
            'password' => Hash::make('1234qwerQWER'),
            'name' => 'Artem',
            'avatar' => 'moonshine_users/LLCB9dR6rYNMvJ3VIsgbChlKxRIOz07GKZOnS4b4.jpg',
        ]);

        DB::table('moonshine_users')->insert([
            'id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            'moonshine_user_role_id' => 1,
            'email' => 'stesha_z@mail.ru',
            'password' => Hash::make('1234qwerQWER'),
            'name' => 'Yulia',
            'avatar' => 'moonshine_users/HN1jr2d5GPSvTA5YrZOIUeqOkSZuaZlIpycGQNr3.jpg',
        ]);

        DB::table('moonshine_users')->insert([
            'id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            'moonshine_user_role_id' => 1,
            'email' => 'lastochkin.andrey@gmail.com',
            'password' => Hash::make('1234qwerQWER'),
            'name' => 'Andrey',
            'avatar' => 'moonshine_users/k1vfwX8fLwqhTcLE4tgcMlh5SK6HkcPd7x1l7fu6.jpg',
        ]);

        DB::table('moonshine_users')->insert([
            'id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            'moonshine_user_role_id' => 1,
            'email' => 'alex.dudnikov@gmail.com',
            'password' => Hash::make('1234qwerQWER'),
            'name' => 'Alexey',
            'avatar' => 'moonshine_users/96uhbLS0P8h1OqxYvVT43qR7nmpyLxcAYx7BeDk3.jpg',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moonshine_users');
    }
};
