<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 150)->unique();
            $table->string('password', 255);
            $table->string('jogositvany_szam');
            $table->string('telefonszam')->nullable();
            $table->string('szamlazasi_cim');
            $table->timestamps();
            $table->rememberToken();
        });
    }
};
