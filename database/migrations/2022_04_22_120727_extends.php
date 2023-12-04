<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(){
        Schema::create('products', function (Blueprint $table) {
            $table->id(); //$table->increments('products_id');
            // $table->enum('name', ['PS1', 'PS2', 'PS3', 'PS4', 'PS5']);
			$table->string('name');
            $table->string('gambar')->nullable();
            $table->string('brand')->nullable();
            $table->double('buy_price');
            $table->integer('sale_price');
            $table->text('comment'); //tata_tertib
			$table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->integer('stock')->nullable()->after('name');
        });
		Schema::create('users', function (Blueprint $table) {
            $table->id();
		    $table->integer('no_hp');
			$table->string('foto_profil');
			$table->text('alamat');
			$table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
			$table->timestamp('deleted_at')->nullable();
            $table->enum('level', ['Admin', 'Customer']);
            $table->timestamps();
        });
		Schema::create('transactions', function (Blueprint $table) {
            $table->id();
			$table->foreignId('products_id')->constrained('products', 'id')->onDelete('CASCADE')->onUpdate('CASCADE');//$table->integer('playstations_id');
			$table->foreignId('users_id')->constrained('users', 'id')->onDelete('CASCADE')->onUpdate('CASCADE');//$table->integer('users_id');
			$table->integer('suppliers_id');
            $table->integer('stock'); //->constrained('stock', 'id')->onDelete('CASCADE')->onUpdate('CASCADE');//$table->integer('playstations_id');
			$table->date('rental_date');
			$table->date('return_date');
			$table->date('actual_return_date');
            $table->text('comment');
			$table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
		Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users', 'id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->enum('reason', ['Question', 'Comment', 'Complaint']);
            $table->string('message');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phonenum');
            $table->enum('rate', ['Excellent', 'Very Good', 'Good', 'Average', 'Poor']);
            $table->timestamps();
        });
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->string('name'); 
		    $table->integer('age');
	     	$table->enum('marriage_status', ['menikah', 'jomblo']);
            $table->timestamps();
        });
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('suppliers_id');
            $table->string('name');
            $table->string('name_company');
            $table->string('kota');
            $table->integer('telp');
            $table->integer('contact');
            $table->text('information');
			$table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
		//drop constraint first
		Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['products_id']);
            $table->dropForeign(['users_id']);
        });
        Schema::table('feedback', function (Blueprint $table) {
            $table->dropForeign(['users_id']);
        });
		Schema::dropIfExists('products');
        Schema::dropIfExists('transaction');
        Schema::dropIfExists('feedback');
        // Schema::table('products', function (Blueprint $table) {$table->drop('stock');});
        Schema::dropIfExists('employee');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('users');
    }
};