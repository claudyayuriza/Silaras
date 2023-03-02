<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_korban".
 *
 * @property int $id_korban
 * @property string $nik
 * @property string $nama_korban
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property int $jenis_kelamin
 * @property int $agama_korban
 * @property int $umur_korban
 * @property string $alamat_korban
 * @property string $no_hp
 * @property int $id_kasus
 * @property string|null $create_at
 * @property string|null $update_at
 * @property int|null $create_by
 * @property int|null $update_by
 */
class TKorban extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_korban';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'nama_korban', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama_korban', 'umur_korban', 'alamat_korban', 'no_hp', 'id_kasus'], 'required'],
            [['tanggal_lahir', 'create_at', 'update_at'], 'safe'],
            [['jenis_kelamin', 'agama_korban', 'umur_korban', 'id_kasus', 'create_by', 'update_by'], 'integer'],
            [['alamat_korban'], 'string'],
            [['nik'], 'string', 'max' => 18],
            [['nama_korban', 'tempat_lahir'], 'string', 'max' => 30],
            [['no_hp'], 'string', 'max' => 13],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_korban' => 'Id Korban',
            'nik' => 'Nik',
            'nama_korban' => 'Nama Korban',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama_korban' => 'Agama Korban',
            'umur_korban' => 'Umur Korban',
            'alamat_korban' => 'Alamat Korban',
            'no_hp' => 'No Hp',
            'id_kasus' => 'Id Kasus',
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

    public function gedatakorban(){
        $data = TKorban ::find()-> all();
        $dropDown = \yii\helpers\ArrayHelper::map($data, 'id_korban','nama_korban');
        return $dropDown;
    }

    public function getKategori(){
        return $this->hasOne(Kategori::className(),['id_kategori'=>'id_korban']);
    }

}
