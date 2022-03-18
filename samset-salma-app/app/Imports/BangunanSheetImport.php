<?php

namespace App\Imports;

use App\Models\AsetBangunan;
use Maatwebsite\Excel\Concerns\ToModel;

class BangunanSheetImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AsetBangunan([
            //
        ]);
    }
}
