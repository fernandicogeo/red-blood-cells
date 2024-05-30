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
        Schema::create('menstruations', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('menstruasi');
            $table->string('bulan')->nullable();
            $table->string('hari_menstruasi')->nullable();
            $table->string('frekuensi_tablet');
            $table->string('isFinished')->nullable(); // 1 == finish, 0 == not yet
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menstruations');
    }
};
