<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rendeles', function (Blueprint $table) {
            $table->id();
            $table->integer('ar');
            $table->date('megrendeles_datum');
            $table->foreignId('felhasznalo_id')->references('id')->on('users');
            $table->foreignId('auto_id')->references('id')->on('autos');
            $table->foreignId('naptar_id')->references('id')->on('naptars')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rendeles');
    }
};
