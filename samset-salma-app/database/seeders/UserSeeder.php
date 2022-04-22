<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        // $model->name = 'admin';
        // $model->level_akses = '2';
        // $model->password = 'admin';
        // $model->save();
        $model->create([
            'name' => 'admin',
            'password' => 'admin',
            'level_akses' => 2,
        ]);
        $model->create([
            'name' => 'PJ',
            'password' => 'PJ',
            'level_akses' => 1,
        ]);
        $model->create([
            'name' => 'user',
            'password' => 'user',
            'level_akses' => 0,
        ]);

        // not using helper
        // $helper = new SeederHelper();
        // $helper->parseCSV("database/data/Kendaraan.csv", $model->getLabel(), $model);
    }
}
