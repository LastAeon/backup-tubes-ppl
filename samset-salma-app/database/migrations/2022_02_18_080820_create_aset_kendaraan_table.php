<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset_kendaraan', function (Blueprint $table) {
            $table->increments('Idx');
            $table->string('Global_Id')->nullable();
            $table->string('Jenis_merk')->nullable();
            $table->string('nomor_mesin')->nullable();
            $table->string('nomor_rangka')->nullable();
            $table->integer('isi_silinder')->nullable();
            $table->integer('tahun_pembuatan')->nullable();
            $table->string('no_bpkb')->nullable();
            $table->string('no_polisi')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->integer('jumlah_unit')->nullable();
            $table->integer('nilai_perolehan')->nullable();
            $table->integer('ue_penyusutan')->nullable();
            $table->float('tarif_penyusutan')->nullable();
            $table->float('akumulasi_penyusutan')->nullable();
            $table->integer('nilai_buku')->nullable();
            $table->string('pj')->nullable();
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
        Schema::dropIfExists('aset_kendaraan');
    }
}
