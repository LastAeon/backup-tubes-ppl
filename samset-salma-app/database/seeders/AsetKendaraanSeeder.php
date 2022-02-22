<?php

namespace Database\Seeders;

use App\Models\AsetKendaraan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AsetKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = [
            // fill the database column name
            'Idx',
            'Jenis_merk',
            'nomor_mesin',
            'nomor_rangka',
            'isi_silinder',
            'tahun_pembuatan',
            'no_bpkb',
            'no_polisi',
            'sumber_dana',
            'jumlah_unit',
            'nilai_perolehan',
            'ue_penyusutan',
            'tarif_penyusutan',
            'akumulasi_penyusutan',
            'nilai_buku',
            'pj',
        ];
        
        $model = new AsetKendaraan();
        $model->truncate();
        $helper = new SeederHelper();
        $helper->parseCSV("database\data\Kendaraan.csv", $labels, $model);
    }
}
