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
        Schema::create('votings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('president_id');
            $table->unsignedBigInteger('vice_president_id');
            $table->unsignedBigInteger('senator_id_1')->nullable();
            $table->unsignedBigInteger('senator_id_2')->nullable();
            $table->unsignedBigInteger('senator_id_3')->nullable();
            $table->unsignedBigInteger('senator_id_4')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('president_id')->references('id')->on('presidents')->onDelete('cascade');
            $table->foreign('vice_president_id')->references('id')->on('vicepres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votings');
    }
};
