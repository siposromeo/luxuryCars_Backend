<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('naptars', function (Blueprint $table) {
            $table->id();
            $table->dateTime('berles_Kezdete');
            $table->dateTime('berles_Vege');
            $table->date('berles_Idotartama');
            $table->foreignId('auto_id')->references('id')->on('autos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('naptars');
    }
};
