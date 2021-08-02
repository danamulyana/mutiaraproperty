<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utils', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('address');
            $table->string('name_site');
            $table->string('telp_site');
            $table->string('email_site');
            $table->string('facebook_site')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('instagram_site')->nullable();
            $table->string('youtube_site')->nullable();
            $table->string('linked_site')->nullable();
            $table->string('whatsapp_no')->nullable();
            $table->string('whatsapp_message')->nullable();
            $table->boolean('whatsapp_position')->default(false)->nullable();
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
        Schema::dropIfExists('utils');
    }
}
