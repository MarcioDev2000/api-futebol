<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('short_name', 50);
            $table->string('logo_url', 255)->nullable();
            $table->year('founded_year')->nullable();
            $table->string('stadium', 255)->nullable();
            $table->string('country', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teams');
    }
};