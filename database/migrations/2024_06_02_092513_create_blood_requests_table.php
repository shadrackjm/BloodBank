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
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('email')->nullable();
            $table->string('gender');
            $table->string('phone_number');
            $table->string('age');
            $table->string('address');
            $table->unsignedBigInteger('blood_group_id');
            $table->unsignedBigInteger('blood_bank_id');
            $table->foreign('blood_group_id')->references('id')->on('blood_groups')->onDelete('cascade');
            $table->foreign('blood_bank_id')->references('id')->on('blood_banks')->onDelete('cascade');
            $table->integer('amount');
            $table->integer('price');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_requests');
    }
};
