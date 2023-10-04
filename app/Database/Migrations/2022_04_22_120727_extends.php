<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); //$table->increments('products_id');
            $table->enum('name', ['PS1', 'PS2', 'PS3', 'PS4', 'PS5']);
            $table->string('gambar')->nullable();
            $table->string('brand');
            $table->double('buy_price');
            $table->integer('sale_price');
            $table->text('comment'); //tata_tertib
			$table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->integer('stock')->after('name');
        });
    }
    public function down()
    {
		Schema::dropIfExists('products');
        // Schema::table('products', function (Blueprint $table) {$table->drop('stock');});
    }
};