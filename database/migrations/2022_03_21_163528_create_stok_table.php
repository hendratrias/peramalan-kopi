<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bahan_baku_id');
            $table->date('tgl_beli');
            $table->date('tgl_kadaluarsa');
            $table->integer('jumlah_beli');
            $table->integer('sisa');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('bahan_baku_id')->references('id')->on('bahan_baku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok');
    }
}
