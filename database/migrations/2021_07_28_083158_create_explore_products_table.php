<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExploreProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('explore_products', function (Blueprint $table) {
            $table->id();
            $table->string('explore_title')->unique();
            $table->string('slug');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('video')->nullable();
            $table->string('video_link')->nullable();
            $table->string('baner_1');
            $table->string('baner_2');
            $table->string('baner_1_link');
            $table->string('baner_2_link');
            $table->string('title_accord');
            $table->string('subtitle_accord')->nullable();
            $table->string('denah_title')->nullable();
            $table->string('denah_subtitle')->nullable();
            $table->string('denah_image')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('long', 11, 8)->nullable();
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
        Schema::dropIfExists('explore_products');
    }
}
