<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discovers', function (Blueprint $table) {
            $table->id();
            $table->string('discover_title')->unique();
            $table->string('slug');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('title_list');
            $table->string('subtitle_list')->nullable();
            $table->string('video')->nullable();
            $table->string('video_link')->nullable();
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
        Schema::dropIfExists('discovers');
    }
}
