<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetBangunanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset_bangunan', function (Blueprint $table) {
            $table->increments('Idx');
            $table->string('Nama_Bangunan')->nullable();
            $table->string('Alamat')->nullable();
            $table->integer('Luas_Bangunan')->nullable();
            $table->integer('Jumlah_Lantai')->nullable();
            $table->integer('Tahun_Dibangun')->nullable();
            $table->integer('Tahun_Digunakan')->nullable();
            $table->integer('Nilai_Perolehan')->nullable();
            $table->integer('Penambahan_Nilai_Manfaat')->nullable();
            $table->integer('Umur_Ekonomis')->nullable();
            $table->integer('Lama_Digunakan')->nullable();
            $table->float('Tarif')->nullable();
            $table->integer('Akumulasi')->nullable();
            $table->integer('Nilai_Buku')->nullable();
            $table->string('Foto')->nullable();
            $table->string('Pendukung')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aset_bangunan');
    }
}
