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
        $model = new AsetKendaraan();
        $model->truncate();
        $helper = new SeederHelper();
        $helper->parseCSV("database/data/Kendaraan.csv", $model->getLabel(), $model);
    }
}
