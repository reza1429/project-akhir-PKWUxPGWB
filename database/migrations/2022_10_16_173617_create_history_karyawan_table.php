<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_karyawan', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('karyawan_id')->unsigned();
            $table->foreign('karyawan_id')->references('id_karyawan')->on('karyawan')->onDelete('cascade')->onUpdate('cascade');
            // $table->BigInteger('obat_id')->unsigned();
            // $table->foreign('obat_id')->references('id')->on('obat')->onDelete('cascade')->onUpdate('cascade');
            $table->BigInteger('penanggung_jawab')->unsigned();
            $table->foreign('penanggung_jawab')->references('user_id')->on('tb_user')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('penanggung_jawab');
            $table->string('keluhan');
            $table->string('diagnosa');
            $table->string('obat');
            $table->string('status');
            $table->string('surat');
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
        Schema::dropIfExists('history_karyawan');
    }
};
