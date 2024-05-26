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
        Schema::create('makanans', function (Blueprint $table) {
            $table->id();
            $table->string('bahan_makanan');
            $table->decimal('energi', 8, 2);
            $table->decimal('protein', 8, 2);
            $table->decimal('lemak', 8, 2);
            $table->decimal('kh', 8, 2); // karbohidrat
            $table->decimal('fe', 8, 2); // zat besi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('makanans');
    }
};
