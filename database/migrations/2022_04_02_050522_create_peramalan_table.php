<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeramalanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peramalan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->date('tgl');
            $table->date('periode');
            $table->string('metode');
            $table->decimal('aktual');
            $table->decimal('hasil');
            $table->decimal('MAPE');
            $table->decimal('rekomendasi_stok');
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peramalan');
    }
}
