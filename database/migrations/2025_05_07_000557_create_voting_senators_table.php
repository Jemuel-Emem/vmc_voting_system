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
        Schema::create('voting_senators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voting_id');
            $table->unsignedBigInteger('senator_id');
            $table->timestamps();

            $table->foreign('voting_id')->references('id')->on('votings')->onDelete('cascade');
            $table->foreign('senator_id')->references('id')->on('senators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voting_senators');
    }
};
