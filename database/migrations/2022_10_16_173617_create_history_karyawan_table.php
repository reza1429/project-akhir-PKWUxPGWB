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
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade')->onUpdate('cascade');
            // $table->BigInteger('obat_id')->unsigned();
            // $table->foreign('obat_id')->references('id')->on('obat')->onDelete('cascade')->onUpdate('cascade');
            $table->text('keterangan');
            $table->text('penanggung_jawab');
            $table->text('status');
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
