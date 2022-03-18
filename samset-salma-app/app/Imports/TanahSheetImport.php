<?php

namespace App\Imports;

use App\Models\AsetTanah;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class TanahSheetImport implements ToCollection, WithCalculatedFormulas
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $item = new AsetTanah();
        $labels = $item->getLabel();
        foreach($collection as $row){
            $i = array_search("Tanggal_Perolehan", $labels)+1;
            if($row[$i] != null){
                $row[$i] = Date::excelToDateTimeObject($row[$i]);
            }
            (new ImportHelper)->insertAset($row, $labels, $item);
        }
    }
}
