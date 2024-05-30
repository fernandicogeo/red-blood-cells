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
        Schema::create('dianjurkans', function (Blueprint $table) {
            $table->id();
            $table->string('sumber');
            $table->string('bahan_makanan');
            $table->decimal('fe', 8, 2); // zat besi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dianjurkans');
    }
};
