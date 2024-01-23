<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->string('marka_modelnev');
            $table->integer('ferohely');
            $table->integer('loero');
            $table->string('kep_Url');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
