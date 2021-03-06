<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Observable;
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
    use Observable;
    public $timestamps = false;
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
    protected $fillable = ['Global_Id', 'Jalan', 'No', 'RT', 'RW', 'Desa_Kelurahan', 'Kecamatan', 'Kabupaten_Kota', 'Propinsi', 'Tanggal_Perolehan', 'No_Persil', 'No_Sertifikat', 'NIB', 'Luas', 'Harga_Satuan', 'Nilai_Perolehan', 'Keterangan', 'Foto', 'Pendukung'];

    private $labels = [
        // fill the database column name
        'Jalan',
        'No',
        'RT',
        'RW',
        'Desa_Kelurahan',
        'Kecamatan',
        'Kabupaten_Kota',
        'Propinsi',
        'Tanggal_Perolehan',
        'No_Persil',
        'No_Sertifikat',
        'NIB',
        'Luas',
        'Harga_Satuan',
        'Nilai_Perolehan',
        'Keterangan',
    ];

    public function getLabel(){
        return $this->labels;
    }

    public $tableCode = "AT";
    protected static function boot(){
        parent::boot();
        static::created(function ($model) {
            $model->Global_Id = $model->tableCode . $model->Idx;
            $model->saveQuietly();
        });
        static::saving(function ($model) {
            // auto fill filed on every time data saved/changed
            if($model->isDirty(['Harga_Satuan', 'Luas']) && !$model->isDirty('Nilai_Perolehan') && $model->Harga_Satuan!==null && $model->Luas!==null){
                $model->Nilai_Perolehan =  $model->Harga_Satuan*$model->Luas;
            }
        });
    }

    public function new(){
        return new AsetTanah();
    }
}
