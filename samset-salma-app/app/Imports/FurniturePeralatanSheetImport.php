<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\AsetFurniturePeralatan;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class FurniturePeralatanSheetImport implements ToCollection, WithCalculatedFormulas
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $item = new AsetFurniturePeralatan();
        $labels = $item->getLabel();
        foreach($collection as $row){
            (new ImportHelper)->insertAset($row, $labels, $item);
        }
    }
}
