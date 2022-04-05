<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetFurniturePeralatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset_furniture_peralatan', function (Blueprint $table) {
            $table->increments('Idx');
            $table->string('nama_barang')->nullable();
            $table->string('merk_type')->nullable();
            $table->string('kategori')->nullable();
            $table->integer('tahun_perolehan')->nullable();
            $table->string('sumber_perolehan')->nullable();
            $table->integer('jumlah_perolehan')->nullable();
            $table->integer('harga_satuan_perolehan')->nullable();
            $table->integer('nilai_perolehan')->nullable();
            $table->integer('UE_penyusutan')->nullable();
            $table->float('tarif_penyusutan')->nullable();
            $table->float('akumulasi_penyusutan')->nullable();
            $table->integer('nilai_buku')->nullable();
            $table->string('PJ')->nullable();
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
        Schema::dropIfExists('aset_furniture_peralatan');
    }
}
