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
        Schema::create('recalls', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('tanggal');
            $table->decimal('total_energi', 8, 2);
            $table->string('kategori_energi')->nullable();
            $table->decimal('total_protein', 8, 2);
            $table->string('kategori_protein')->nullable();
            $table->decimal('total_lemak', 8, 2);
            $table->string('kategori_lemak')->nullable();
            $table->decimal('total_kh', 8, 2); // karbohidrat
            $table->string('kategori_kh')->nullable();
            $table->decimal('total_fe', 8, 2); // zat besi
            $table->string('kategori_fe')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recalls');
    }
};
