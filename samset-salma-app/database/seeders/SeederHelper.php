<?php
namespace Database\Seeders;

use App\Models\AsetTanah;
use App\Models\ChangeLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeederHelper
{
    /**
     * Seed the database from CSV.
     *
     * @return void
     */
    public function parseCSV($path, $labels, $model){
        // store history last index
        $last_history = ChangeLog::max('id') ?? 0;
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
                // $model->Global_Id = $model->tableCode . $model->Idx;
                $model->save();
                $model = $model->new();
            }
            $firstline = false;
        }

        fclose($csvFile);
        // delete created history
        var_dump($last_history);
        ChangeLog::where('id', '>', $last_history)->delete();
    }
}
