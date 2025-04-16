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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name');

            // Foreign keys (nullable in case the IDs are not yet assigned)
            $table->unsignedBigInteger('president_id')->nullable();
            $table->unsignedBigInteger('vicepres_id')->nullable();
            $table->json('senators_id');
            $table->timestamps();

            $table->foreign('president_id')->references('id')->on('presidents')->onDelete('set null');
            $table->foreign('vicepres_id')->references('id')->on('vicepres')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
