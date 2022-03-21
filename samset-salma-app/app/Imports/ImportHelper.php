<?php
namespace App\Imports;

class ImportHelper
{
    /**
     * Seed the database from CSV.
     *
     * @return void
     */
    public function insertAset($data, $labels, $item){
        if($data->filter()->isNotEmpty()){
            $object = [];
            $i = 1;
            foreach($labels as $label){
                if($data[$i] == '' or $data[$i] == '-' or $data[$i] == '#REF!'){
                    $object[$label] = null;
                }else{
                    $object[$label] = $data[$i];
                }
                $i++;
            }
            var_dump($object);
            $item->create($object);
        }
    }

}
