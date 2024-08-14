<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('country', 100);
            $table->string('logo_url', 255)->nullable();
            $table->string('season', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leagues');
    }
};