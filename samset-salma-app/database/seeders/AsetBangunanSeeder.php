<?php

namespace Database\Seeders;

use App\Models\AsetBangunan;
use Illuminate\Database\Seeder;
use Database\Seeders\SeederHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AsetBangunanSeeder extends Seeder
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
            'Nama_Bangunan',
            'Alamat',
            'Luas_Bangunan',
            'Jumlah_Lantai',
            'Tahun_Dibangun',
            'Tahun_Digunakan',
            'Nilai_Perolehan',
            'Penambahan_Nilai_Manfaat',
            'Umur_Ekonomis',
            'Lama_Digunakan',
            'Tarif',
            'Akumulasi',
            'Nilai_Buku',
        ];
        
        $model = new AsetBangunan();
        $model->truncate();
        $helper = new SeederHelper();
        $helper->parseCSV("database\data\Bangunan.csv", $labels, $model);
    }
}
