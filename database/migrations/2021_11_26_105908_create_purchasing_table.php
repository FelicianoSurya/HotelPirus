<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplierID');
            $table->unsignedBigInteger('inventoryID');
            $table->integer('qtyPurchased');
            $table->integer('price');
            $table->integer('grand');
            $table->enum('status',['arrived','recieved','cancel','paid'])->default('arrived');
            $table->unsignedBigInteger('createdBy');
            $table->unsignedBigInteger('updatedBy');
            $table->timestamps();
            
            $table->foreign('createdBy')->references('id')->on('users');
            $table->foreign('updatedBy')->references('id')->on('users');
            $table->foreign('supplierID')->references('id')->on('suppliers');
            $table->foreign('inventoryID')->references('id')->on('inventory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchasing');
    }
}
