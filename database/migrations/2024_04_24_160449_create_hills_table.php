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
        Schema::create('hills', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('country', 50);
            $table->string('city', 50);
            $table->integer('build_year')->nullable();
            $table->integer('hill_size');
            $table->float('record')->nullable();
            $table->string('record_holder')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hills');
    }
};
