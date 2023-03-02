<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_pelaku".
 *
 * @property int $id_pelaku
 * @property string $nik
 * @property string $nama_pelaku
 * @property int $id_kasus
 * @property string $tempat_lahir_pelaku
 * @property string $tanggal_lahir_pelaku
 * @property int $jenis_kelamin_pelaku
 * @property int $agama_pelaku
 * @property int $umur_pelaku
 * @property string $alamat_pelaku
 * @property string $hub_korban
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $create_by
 * @property int|null $update_by
 */
class TPelaku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_pelaku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pelaku', 'id_kasus', 'jenis_kelamin_pelaku', 'umur_pelaku', 'hub_korban'], 'required'],
            [['id_kasus', 'jenis_kelamin_pelaku', 'agama_pelaku', 'umur_pelaku', 'create_at', 'update_at', 'create_by', 'update_by'], 'integer'],
            [['tanggal_lahir_pelaku'], 'safe'],
            [['alamat_pelaku'], 'string'],
            [['nik'], 'string', 'max' => 18],
            [['nama_pelaku', 'tempat_lahir_pelaku'], 'string', 'max' => 30],
            [['hub_korban'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pelaku' => 'Id Pelaku',
            'nik' => 'Nik',
            'nama_pelaku' => 'Nama Pelaku',
            'id_kasus' => 'Id Kasus',
            'tempat_lahir_pelaku' => 'Tempat Lahir Pelaku',
            'tanggal_lahir_pelaku' => 'Tanggal Lahir Pelaku',
            'jenis_kelamin_pelaku' => 'Jenis Kelamin Pelaku',
            'agama_pelaku' => 'Agama Pelaku',
            'umur_pelaku' => 'Umur Pelaku',
            'alamat_pelaku' => 'Alamat Pelaku',
            'hub_korban' => 'Hub Korban',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
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


    public function getdatakasus(){
        return $this->hasOne(TKasus::className(),['id_kasus'=>'id_kasus']);
    }

    public function getKategori(){
        return $this->hasOne(Kategori::className(),['id_kategori'=>'id_pelaku']);
    }
}
