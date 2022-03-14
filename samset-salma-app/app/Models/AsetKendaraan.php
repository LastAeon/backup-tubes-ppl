<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $Idx
 * @property string $Jenis_merk
 * @property string $nomor_mesin
 * @property string $nomor_rangka
 * @property int $isi_silinder
 * @property int $tahun_pembuatan
 * @property string $no_bpkb
 * @property string $no_polisi
 * @property string $sumber_dana
 * @property int $jumlah_unit
 * @property int $nilai_perolehan
 * @property int $ue_penyusutan
 * @property float $tarif_penyusutan
 * @property float $akumulasi_penyusutan
 * @property int $nilai_buku
 * @property string $pj
 */
class AsetKendaraan extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'aset_kendaraan';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Idx';

    /**
     * @var array
     */
    protected $fillable = ['Jenis_merk', 'nomor_mesin', 'nomor_rangka', 'isi_silinder', 'tahun_pembuatan', 'no_bpkb', 'no_polisi', 'sumber_dana', 'jumlah_unit', 'nilai_perolehan', 'ue_penyusutan', 'tarif_penyusutan', 'akumulasi_penyusutan', 'nilai_buku', 'pj'];

    private $labels = [
        // fill the database column name
        'Idx',
        'Jenis_merk',
        'nomor_mesin',
        'nomor_rangka',
        'isi_silinder',
        'tahun_pembuatan',
        'no_bpkb',
        'no_polisi',
        'sumber_dana',
        'jumlah_unit',
        'nilai_perolehan',
        'ue_penyusutan',
        'tarif_penyusutan',
        'akumulasi_penyusutan',
        'nilai_buku',
        'pj',
    ];

    public function getLabel(){
        return $this->labels;
    }
}
