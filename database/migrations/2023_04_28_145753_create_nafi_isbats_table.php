<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNafiIsbatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nafi_isbats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('paket_nafi_isbat_id')->unsigned();
            $table->bigInteger('jamaah_id')->unsigned()->unique();
            $table->timestamps();
            $table->foreign('paket_nafi_isbat_id')->references('id')->on('paket_nafi_isbats')->onDelete('cascade');
            $table->foreign('jamaah_id')->references('id')->on('jamaahs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nafi_isbats');
    }
}
