<?php

use App\Models\OwnerRole;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('owner_roles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        OwnerRole::create([
            'name' => 'Владелец'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owner_roles');
    }
};
