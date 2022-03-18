<?php

namespace App\Imports;

use App\Models\AsetKendaraan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class KendaraanSheetImport implements ToCollection, WithCalculatedFormulas
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $item = new AsetKendaraan();
        $labels = $item->getLabel();
        foreach($collection as $row){
            (new ImportHelper)->insertAset($row, $labels, $item);
        }
    }
}
