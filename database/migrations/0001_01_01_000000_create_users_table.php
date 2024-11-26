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
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('usuario')->unique();
        $table->string('pass');
        $table->string('nombre');
        $table->integer('idlogico');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('users');
}

};
