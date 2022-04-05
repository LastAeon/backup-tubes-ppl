<?php
namespace Database\Seeders;

use App\Models\AsetTanah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeederHelper
{
    /**
     * Seed the database from CSV.
     *
     * @return void
     */
    public function parseCSV($path, $labels, $model){
        // $temp = $model->logStatus;
        // echo $model->logStatus;
        // echo false;
        // echo "\ndi seeder\n";
        // $model->logStatus = false;
        // if(!$model->logStatus){
        //     echo "lolos\n";
        // }
        $csvFile = fopen(base_path($path), "r");
  
        $firstline = true;
        while (($row = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                $i = 1;
                foreach($labels as $label){
                    $row[$i] = trim($row[$i]);
                    if($row[$i] == '' or $row[$i] == '-' or $row[$i] == '#REF!'){
                        $model->{$label} = null;
                    }else{
                        $model->{$label} = $row[$i];
                    }
                    $i++;
                }
                $model->Global_Id = $model->tableCode . $model->Idx;
                $model->saveQuietly();
                $model = $model->new();
            }
            $firstline = false;
        }
   
        fclose($csvFile);
        // $model->logStatus = $temp;
    }
}
