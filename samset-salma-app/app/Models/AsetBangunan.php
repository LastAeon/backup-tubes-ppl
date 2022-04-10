<?php

namespace App\Models;

use App\Traits\Observable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property int $Idx
 * @property string $Nama Bangunan
 * @property string $Alamat
 * @property int $Luas_Bangunan
 * @property int $Jumlah_Lantai
 * @property int $Tahun_Dibangun
 * @property int $Tahun_Digunakan
 * @property int $Nilai_Perolehan
 * @property int $Penambahan_Nilai_Manfaat
 * @property int $Umur_Ekonomis
 * @property int $Lama_Digunakan
 * @property float $Tarif
 * @property int $Akumulasi
 * @property int $Nilai_Buku
 */
class AsetBangunan extends Model
{
    use Observable;
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'aset_bangunan';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Idx';

    /**
     * @var array
     */
    protected $fillable = ['Global_Id', 'nama_bangunan', 'Alamat', 'Luas_Bangunan', 'Jumlah_Lantai', 'Tahun_Dibangun', 'Tahun_Digunakan', 'Nilai_Perolehan', 'Penambahan_Nilai_Manfaat', 'Umur_Ekonomis', 'Lama_Digunakan', 'Tarif', 'Akumulasi', 'Nilai_Buku', 'Foto', 'Pendukung'];

    private $labels = [
        // fill the database column name
        'Nama_Bangunan',
        'Alamat',
        'Luas_Bangunan',
        'Jumlah_Lantai',
        'Tahun_Dibangun',
        'Tahun_Digunakan',
        'Nilai_Perolehan',
        'Penambahan_Nilai_Manfaat',
        'Umur_Ekonomis',
        // 'Lama_Digunakan',
        // 'Tarif',
        // 'Akumulasi',
        // 'Nilai_Buku',
    ];

    
    public function getLabel(){
        return $this->labels;
    }

    public $tableCode = "AB";
    protected static function boot(){
        parent::boot();
        static::created(function ($model) {
            $model->Global_Id = $model->tableCode . $model->Idx;
            $model->saveQuietly();
        });
        static::saving(function ($model) {
            // auto fill filed on every time data saved/changed
            if($model->isDirty('Tahun_Digunakan') && $model->Tahun_Digunakan !== null){
                $model->Lama_Digunakan = Carbon::now()->format('Y') - $model->Tahun_Digunakan;
            }
            if($model->isDirty('Umur_Ekonomis') && $model->Umur_Ekonomis !== null){
                $model->Tarif = 100/$model->Umur_Ekonomis;
            }
            // ikutin excel
            // $model->Akumulasi = $model->Nilai_Perolehan!==null && $model->Lama_Digunakan!==null && $model->Tarif!==null ? null :  $model->Nilai_Perolehan*$model->Lama_Digunakan*$model->Tarif;
            // ikutin wa
            if($model->isDirty(['Nilai_Perolehan', 'Lama_Digunakan', 'Tarif', 'Penambahan_Nilai_Manfaat']) && $model->Nilai_Perolehan!==null && $model->Lama_Digunakan!==null && $model->Tarif!==null && $model->Penambahan_Nilai_Manfaat!==null){
                $model->Akumulasi = ($model->Nilai_Perolehan+$model->Penambahan_Nilai_Manfaat)*$model->Lama_Digunakan*$model->Tarif/100;
            }
            if($model->isDirty(['Nilai_Perolehan', 'Akumulasi', 'Penambahan_Nilai_Manfaat']) && $model->Nilai_Perolehan!==null && $model->Penambahan_Nilai_Manfaat!==null && $model->Akumulasi!==null){
                $model->Nilai_Buku = $model->Nilai_Perolehan+$model->Penambahan_Nilai_Manfaat-$model->Akumulasi;
            }
        });
    }

    public function new(){
        return new AsetBangunan();
    }
}
/*
[14:48, 4/5/2022] Ian Nurdin Salman PPL: Lama Digunakan = Tahun berjalan - tahun digunakan -> gak ada tahun berjalan, ganti jadi tahun sekarang
[14:48, 4/5/2022] Ian Nurdin Salman PPL: Tarif penyusutan = 100% : usia ekonomi -> done
[14:49, 4/5/2022] Ian Nurdin Salman PPL: Akumulasi penyusutan = Lama digunakan x tarif penyusutan x (nilai perolehan + penambahan nilai manfaat) -> done
[14:49, 4/5/2022] Ian Nurdin Salman PPL: Nilai Buku = Nilai Perolehan + Penambahan Nilai Manfaat - Akumulasi Penyusutan -> done
[14:50, 4/5/2022] Ian Nurdin Salman PPL: Untuk tahun berjalan bisa juga diinput manual saja -> masih bingung
*/
