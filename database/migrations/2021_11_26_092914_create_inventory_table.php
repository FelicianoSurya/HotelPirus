<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->string('inventoryCode')->unique();
            $table->string('inventoryName');
            $table->unsignedBigInteger('categoryID');
            $table->integer('stock');
            $table->unsignedBigInteger('createdBy');
            $table->unsignedBigInteger('updatedBy');
            $table->timestamps();

            $table->foreign('createdBy')->references('id')->on('users');
            $table->foreign('updatedBy')->references('id')->on('users');
            $table->foreign('categoryID')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
