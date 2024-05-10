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
            $table->id('hill_id')->primary();
            $table->string('name', 100)->unique();
            $table->string('country', 50);
            $table->string('city', 50);
            $table->integer('build_year')->nullable();
            $table->integer('hill_size');
            $table->float('record')->nullable();
            $table->bigInteger('record_holder_id')->unsigned()->nullable();
            $table->foreign('record_holder_id')->references('record_holder_id')->on('record_holders');
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
