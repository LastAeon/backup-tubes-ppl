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
        $model = new AsetFurniturePeralatan();
        $model->truncate();
        $helper = new SeederHelper();
        $helper->parseCSV("database\data\FurniturePeralatan.csv", $model->getLabel(), $model);
    }
}
