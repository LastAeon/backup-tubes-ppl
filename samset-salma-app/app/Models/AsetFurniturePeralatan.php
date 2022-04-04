<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $Idx
 * @property string $nama_barang
 * @property string $merk_type
 * @property string $kategori
 * @property int $tahun_perolehan
 * @property string $sumber_perolehan
 * @property int $jumlah_perolehan
 * @property int $harga_satuan_perolehan
 * @property int $nilai_perolehan
 * @property int $UE_penyusutan
 * @property float $tarif_penyusutan
 * @property float $akumulasi_penyusutan
 * @property int $nilai_buku
 * @property string $PJ
 */
class AsetFurniturePeralatan extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'aset_furniture_peralatan';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Idx';

    /**
     * @var array
     */
    protected $fillable = ['Global_Id', 'nama_barang', 'merk_type', 'kategori', 'tahun_perolehan', 'sumber_perolehan', 'jumlah_perolehan', 'harga_satuan_perolehan', 'nilai_perolehan', 'UE_penyusutan', 'tarif_penyusutan', 'akumulasi_penyusutan', 'nilai_buku', 'PJ', 'Foto', 'Pendukung'];

    private $labels = [
        // fill the database column name
        'nama_barang',
        'merk_type',
        'kategori',
        'tahun_perolehan',
        'sumber_perolehan',
        'jumlah_perolehan',
        'harga_satuan_perolehan',
        'nilai_perolehan',
        'UE_penyusutan',
        'tarif_penyusutan',
        'akumulasi_penyusutan',
        'nilai_buku',
        'PJ',
    ];

    public function getLabel(){
        return $this->labels;
    }

    protected static function boot(){
        parent::boot();
        static::created(function ($model) {
            $model->Global_Id = 'AFP' . $model->Idx;
            $model->save();
        });
    }
}
