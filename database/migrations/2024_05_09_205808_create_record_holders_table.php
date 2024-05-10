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
        Schema::create('record_holders', function (Blueprint $table) {
            $table->id('record_holder_id')->primary();
            $table->string('name', 30);
            $table->string('surname', 40);
            $table->string('country', 30);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_holders');
    }
};
