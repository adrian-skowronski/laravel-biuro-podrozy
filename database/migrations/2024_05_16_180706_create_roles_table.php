<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    
    
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'customer']
        ]);
    }
    
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
