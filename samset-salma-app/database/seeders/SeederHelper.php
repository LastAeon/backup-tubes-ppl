<?php
namespace Database\Seeders;

class SeederHelper
{
    /**
     * Seed the database from CSV.
     *
     * @return void
     */
    public function parseCSV($path, $labels, $model){
        $csvFile = fopen(base_path($path), "r");
  
        $firstline = true;
        $data = [];
        while (($row = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                $i = 0;
                foreach($labels as $label){
                    if($i != 0){
                        $row[$i] = trim($row[$i]);
                        if($row[$i] == '' or $row[$i] == '-' or $row[$i] == '#REF!'){
                            $data[$label] = null;
                        }else{
                            $data[$label] = $row[$i];
                            // error_log($label);
                            // error_log($data[$label]);
                        }
                    }
                    $i++;
                }
                $model->create($data);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }

}
