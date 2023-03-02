<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kasus".
 *
 * @property string $no_register
 * @property string $NIK_korban
 * @property string $nama_pelaku
 * @property int $jenis_kelamin
 * @property string|null $alamat_kejadian
 * @property int|null $usia_pelaku
 * @property string $hub_korban
 * @property string $tanggal_kejadian
 * @property string $tanggal_pelaporan
 * @property string $deskripsi_kasus
 * @property int $kategori_kasus
 * @property string $tkp
 * @property string|null $desa_kelurahan
 * @property string|null $kab_kota
 * @property int $status_kasus
 */
class Kasus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kasus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_register', 'NIK_korban', 'nama_pelaku', 'jenis_kelamin', 'hub_korban', 'tanggal_kejadian', 'tanggal_pelaporan', 'deskripsi_kasus', 'kategori_kasus', 'tkp'], 'required'],
            [['jenis_kelamin', 'usia_pelaku', 'kategori_kasus', 'status_kasus'], 'integer'],
            [['alamat_kejadian', 'deskripsi_kasus'], 'string'],
            [['tanggal_kejadian', 'tanggal_pelaporan'], 'safe'],
            [['no_register'], 'string', 'max' => 10],
            [['NIK_korban'], 'string', 'max' => 18],
            [['nama_pelaku', 'hub_korban', 'desa_kelurahan', 'kab_kota'], 'string', 'max' => 50],
            [['tkp'], 'string', 'max' => 100],
            [['no_register'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_register' => 'No Register',
            'NIK_korban' => 'Nik Korban',
            'nama_pelaku' => 'Nama Pelaku',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat_kejadian' => 'Alamat Kejadian',
            'usia_pelaku' => 'Usia Pelaku',
            'hub_korban' => 'Hub Korban',
            'tanggal_kejadian' => 'Tanggal Kejadian',
            'tanggal_pelaporan' => 'Tanggal Pelaporan',
            'deskripsi_kasus' => 'Deskripsi Kasus',
            'kategori_kasus' => 'Kategori Kasus',
            'tkp' => 'Tkp',
            'desa_kelurahan' => 'Desa Kelurahan',
            'kab_kota' => 'Kab Kota',
            'status_kasus' => 'Status Kasus',
        ];
    }

    public function tglIndo($tanggal)
    {
        $bulan = array(
            1 => 'Januari',
                'February',
                'Maret',
                'April',
                'Mei',
                'Juni', 
                'Juli',
                'Agustus', 
                'September',
                'Oktober',
                'November',
                'Desember',
        );

        $pecahkan = explode('-', $tanggal);

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    public function getKategori(){
        return $this->hasOne(Kategori::className(),['id_kategori'=>'kategori_kasus']);
    }

    public function getKorban(){
        return $this->hasOne(Korban::className(),['NIK'=>'NIK_korban']);
    }

}
