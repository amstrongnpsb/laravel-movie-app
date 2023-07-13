<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('director_id');
            $table->foreignId('likeby');
            $table->foreignId('user_posted');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('film_img')->nullable();
            $table->text('sinopsis');
            $table->text('full_sinopsis');
            $table->timestamp('release_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
