<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailMutasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_mutasi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_mutasi');
            $table->string('kode_barang', 30)->nullable();
            $table->enum('indikator', ['Masuk', 'Keluar']);
            $table->integer('quantity');
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
        Schema::dropIfExists('detail_mutasi');
    }
}
