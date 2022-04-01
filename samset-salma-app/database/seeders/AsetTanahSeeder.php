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
        $model = new AsetTanah();
        $model->truncate();
        $helper = new SeederHelper();
        $helper->parseCSV("database/data/Tanah.csv", $model->getLabel(), $model);
    }
}
