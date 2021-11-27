<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplierCode')->unique();
            $table->string('supplierName');
            $table->string('address');
            $table->string('phoneNumber');
            $table->unsignedBigInteger('createdBy');
            $table->unsignedBigInteger('updatedBy');

            $table->foreign('createdBy')->references('id')->on('users');
            $table->foreign('updatedBy')->references('id')->on('users');
  
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
        Schema::dropIfExists('suppliers');
    }
}
