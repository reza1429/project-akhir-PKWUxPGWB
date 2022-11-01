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
        Schema::create('history_guru', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('guru_id')->unsigned();
            $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade')->onUpdate('cascade');
            // $table->BigInteger('obat_id')->unsigned();
            // $table->foreign('obat_id')->references('id')->on('obat')->onDelete('cascade')->onUpdate('cascade');
            $table->string('keterangan');
            $table->string('penanggung_jawab');
            $table->string('status');
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
        Schema::dropIfExists('history_guru');
    }
};
