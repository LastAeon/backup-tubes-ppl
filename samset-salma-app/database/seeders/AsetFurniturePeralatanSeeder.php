<?php

namespace Database\Seeders;

use App\Models\AsetFurniturePeralatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsetFurniturePeralatanSeeder extends Seeder
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
            'nama_barang',
            'merk_type',
            'kategori',
            'tahun_perolehan',
            'sumber_perolehan',
            'jumlah_perolehan',
            'harga_satuan_perolehan',
            'nilai_perolehan',
            'UE_penyusutan',
            'tarif_penyusutan',
            'akumulasi_penyusutan',
            'nilai_buku',
            'PJ',
        ];

        $model = new AsetFurniturePeralatan();
        $model->truncate();
        $helper = new SeederHelper();
        $helper->parseCSV("database\data\FurniturePeralatan.csv", $labels, $model);
    }
}
