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
        Schema::create('konsumsis', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('waktu_makan');
            $table->string('makanan_id');
            $table->string('recall_id')->nullable();
            $table->decimal('jumlah', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsumsis');
    }
};
