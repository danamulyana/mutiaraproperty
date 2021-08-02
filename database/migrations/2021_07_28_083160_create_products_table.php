<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('cover_image');
            $table->string('name');
            $table->string('type');
            $table->string('ukuran');
            $table->string('denah');
            $table->string('denah2')->nullable();
            $table->decimal('harga', $precision = 19, $scale = 2);
            $table->string('no_wa');
            $table->string('pesan_wa');
            $table->foreignId('explore_id')->constrained('explore_products')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
