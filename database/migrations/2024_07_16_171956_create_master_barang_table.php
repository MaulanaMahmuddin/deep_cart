<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterBarang', function (Blueprint $table) {
            $table->integer('idBarang');
            $table->string('gBarang');
            $table->string('nBarang');
            $table->integer('qtyBarang');
            $table->string('hrgBarang');
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
        Schema::dropIfExists('masterBarang');
    }
}
