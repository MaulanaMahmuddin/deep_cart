<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewKeranjangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viewKeranjang', function (Blueprint $table) {
            $table->integer('idVKeranjang');
            $table->integer('idKeranjang');
            $table->integer('idBarang');
            $table->integer('qtyVKeranjang');
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
        Schema::dropIfExists('viewKeranjang');
    }
}
