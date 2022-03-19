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
        $model = new AsetBangunan();
        $model->truncate();
        $helper = new SeederHelper();
        $helper->parseCSV("database\data\Bangunan.csv", $model->getLabel(), $model);
    }
}
