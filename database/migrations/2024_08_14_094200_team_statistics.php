<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('team_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->onDelete('cascade');
            $table->foreignId('match_id')->constrained('matches')->onDelete('cascade');
            $table->integer('goals_scored')->default(0);
            $table->integer('goals_conceded')->default(0);
            $table->float('possession')->default(0);
            $table->integer('shots')->default(0);
            $table->integer('shots_on_target')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('team_statistics');
    }
};