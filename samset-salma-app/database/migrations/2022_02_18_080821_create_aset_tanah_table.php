<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetTanahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset_tanah', function (Blueprint $table) {
            $table->increments('Idx');
            $table->string('Global_Id')->nullable();
            $table->string('Jalan')->nullable();
            $table->integer('No')->nullable();
            $table->integer('RT')->nullable();
            $table->integer('RW')->nullable();
            $table->string('Desa_Kelurahan')->nullable();
            $table->string('Kecamatan')->nullable();
            $table->string('Kabupaten_Kota')->nullable();
            $table->string('Propinsi')->nullable();
            $table->date('Tanggal_Perolehan')->nullable();
            $table->integer('No_Persil')->nullable();
            $table->string('No_Sertifikat')->nullable();
            $table->string('NIB')->nullable();
            $table->integer('Luas')->nullable();
            $table->integer('Harga_Satuan')->nullable();
            $table->integer('Nilai_Perolehan')->nullable();
            $table->string('Keterangan')->nullable();
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
        Schema::dropIfExists('aset_tanah');
    }
}
