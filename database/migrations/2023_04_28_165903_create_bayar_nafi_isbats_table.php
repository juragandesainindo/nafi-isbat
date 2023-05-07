<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayarNafiIsbatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayar_nafi_isbats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nafi_isbat_id')->unsigned();
            $table->string('bayar');
            $table->timestamps();
            $table->foreign('nafi_isbat_id')->references('id')->on('nafi_isbats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bayar_nafi_isbats');
    }
}