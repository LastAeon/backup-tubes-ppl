<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = new User();
        $model->truncate();
        $model->name = 'admin';
        $model->password = 'admin';
        $model->level_akses = '2';
        $model->saveQuietly();
        // not using helper
        // $helper = new SeederHelper();
        // $helper->parseCSV("database/data/Kendaraan.csv", $model->getLabel(), $model);
    }
}
