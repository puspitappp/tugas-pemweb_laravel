<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_order', function (Blueprint $table) {
            $table->id('order_id');
            $table->integer('user_id')->nullable();
            $table->timestamp('order_tgl');
            $table->string('order_kode');
            $table->integer('order_ttl')->nullable();
            $table->string('order_kurir');
            $table->integer('order_ongkir');
            $table->dateTime('order_byr_deadline')->nullable();
            $table->integer('order_batal');
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
        Schema::dropIfExists('tb_order');
    }
}
