<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['Nama Bangunan', 'Alamat', 'Luas_Bangunan', 'Jumlah_Lantai', 'Tahun_Dibangun', 'Tahun_Digunakan', 'Nilai_Perolehan', 'Penambahan_Nilai_Manfaat', 'Umur_Ekonomis', 'Lama_Digunakan', 'Tarif', 'Akumulasi', 'Nilai_Buku', 'Foto', 'Pendukung'];

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
        'Lama_Digunakan',
        'Tarif',
        'Akumulasi',
        'Nilai_Buku',
    ];

    public function getLabel(){
        return $this->labels;
    }
}
