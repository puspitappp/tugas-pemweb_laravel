<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->id('produk_id');
            $table->integer('kat_id');
            $table->string('produk_kode')->nullable();
            $table->string('produk_nama');
            $table->integer('produk_hrg');
            $table->text('produk_keterangan');
            $table->integer('produk_stock');
            $table->text('produk_photo')->nullable();
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
        Schema::dropIfExists('tb_produk');
    }
}
