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
        Schema::create('trips', function (Blueprint $table) {
            $table->id('trip_id');
            $table->date('start');
            $table->date('end');
            $table->double('price');
            $table->text('description',500);
            $table->integer('max_participants');
            $table->integer('current_participants');
            $table->string('status');
            $table->bigInteger('coordinator_id')->unsigned();
            $table->foreign('coordinator_id')->references('coordinator_id')->on('coordinators');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
