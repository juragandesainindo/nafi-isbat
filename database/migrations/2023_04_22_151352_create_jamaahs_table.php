<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJamaahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jamaahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jamaah')->unique();
            $table->string('slug');
            $table->string('hp_jamaah')->nullable();
            $table->text('alamat_jamaah')->nullable();
            $table->string('jk', 1);
            $table->string('nik')->nullable();
            $table->string('foto')->nullable();
            $table->string('ktp')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('wilayah_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('wilayah_id')->references('id')->on('wilayahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jamaahs');
    }
}
