<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $Idx
 * @property string $Jalan
 * @property int $No
 * @property int $RT
 * @property int $RW
 * @property string $Desa_Kelurahan
 * @property string $Kecamatan
 * @property string $Kabupaten_Kota
 * @property string $Propinsi
 * @property string $Tanggal_Perolehan
 * @property int $No_Persil
 * @property string $No_Sertifikat
 * @property string $NIB
 * @property int $Luas
 * @property int $Harga_Satuan
 * @property int $Nilai_Perolehan
 * @property string $Keterangan
 */
class AsetTanah extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'aset_tanah';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Idx';

    /**
     * @var array
     */
    protected $fillable = ['Jalan', 'No', 'RT', 'RW', 'Desa_Kelurahan', 'Kecamatan', 'Kabupaten_Kota', 'Propinsi', 'Tanggal_Perolehan', 'No_Persil', 'No_Sertifikat', 'NIB', 'Luas', 'Harga_Satuan', 'Nilai_Perolehan', 'Keterangan'];

}
