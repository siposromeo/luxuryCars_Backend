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
            $table->string('name', 100)->required();
            $table->string('email', 150)->unique()->required();
            $table->string('password', 255)->required();
            $table->string('jogositvany_szam')->required();
            $table->string('telefonszam')->required();
            $table->string('szamlazasi_cim')->required();
            $table->timestamps();
            $table->rememberToken();
        });
    }
};
