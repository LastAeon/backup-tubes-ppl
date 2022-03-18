<?php

namespace App\Imports;

use App\Models\AsetBangunan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class BangunanSheetImport implements ToCollection, WithCalculatedFormulas
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $item = new AsetBangunan();
        $labels = $item->getLabel();
        foreach($collection as $row){
            (new ImportHelper)->insertAset($row, $labels, $item);
        }
    }
}
