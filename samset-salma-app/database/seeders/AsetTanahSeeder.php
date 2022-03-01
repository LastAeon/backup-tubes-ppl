<?php

namespace Database\Seeders;

use App\Models\AsetTanah;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AsetTanahSeeder extends Seeder
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
            'Jalan',
            'No',
            'RT',
            'RW',
            'Desa_Kelurahan',
            'Kecamatan',
            'Kabupaten_Kota',
            'Propinsi',
            'Tanggal_Perolehan',
            'No_Persil',
            'No_Sertifikat',
            'NIB',
            'Luas',
            'Harga_Satuan',
            'Nilai_Perolehan',
            'Keterangan',
        ];

        $model = new AsetTanah();
        $model->truncate();
        $helper = new SeederHelper();
        $helper->parseCSV("database\data\Tanah.csv", $labels, $model);
    }
}
