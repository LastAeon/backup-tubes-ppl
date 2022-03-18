<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AsetImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        echo "masuk aset import";
        return [
            'Tanah' => new TanahSheetImport(),
            'Bangunan' => new BangunanSheetImport(),
            'Kendaraan' => new KendaraanSheetImport(),
            'Furniture & Peralatan' => new FurniturePeralatanSheetImport(),
        ];
    }
}
