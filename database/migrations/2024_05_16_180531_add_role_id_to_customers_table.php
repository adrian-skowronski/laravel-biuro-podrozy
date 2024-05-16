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
        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->default(2); // for customers
        });
    }
    
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('role_id');
        });
    }
};
