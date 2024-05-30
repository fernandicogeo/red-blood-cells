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
        Schema::create('recall_menstruations', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('menstruation_id');
            $table->string('tanggal')->nullable();
            $table->string('hari');
            $table->string('isKonsumsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recall_menstruations');
    }
};
