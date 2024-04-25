<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_order_detail', function (Blueprint $table) {
            $table->id('order_detail_id');
            $table->string('order_kode');
            $table->string('produk_kode');
            $table->integer('detail_harga');
            $table->integer('detail_jml');
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
        Schema::dropIfExists('tb_order_detail');
    }
}
