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
        Schema::create('blood_bank_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blood_bank_id');
            $table->foreign('blood_bank_id')->references('id')->on('blood_banks')->onDelete('cascade');
            $table->unsignedBigInteger('blood_group_id');
            $table->foreign('blood_group_id')->references('id')->on('blood_groups')->onDelete('cascade');
            $table->integer('amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_bank_stocks');
    }
};
