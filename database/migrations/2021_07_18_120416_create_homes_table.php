<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('main_title');
            $table->string('main_subtitle')->nullable();
            $table->string('main_video_link', 2048)->nullable();
            $table->string('main_video', 2048)->nullable();
            $table->string('section1_title')->nullable();
            $table->string('section1_subtitle')->nullable();
            $table->string('section1_video', 2048)->nullable();
            $table->string('section1_video_link', 2048)->nullable();
            $table->string('section2_title')->nullable();
            $table->string('section2_subtitle')->nullable();
            $table->string('section2_video', 2048)->nullable();
            $table->string('section2_video_link', 2048)->nullable();
            $table->string('title_carausel1')->nullable();
            $table->string('subtitle_carausel1')->nullable();
            $table->string('title_carausel2')->nullable();
            $table->string('subtitle_carausel2')->nullable();
            $table->string('newslater_title')->nullable();
            $table->string('newslater_subtitle')->nullable();
            $table->string('update_name')->default('admin');
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
        Schema::dropIfExists('homes');
    }
}
