<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "korban".
 *
 * @property string $NIK
 * @property string $nama_korban
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property int $jenis_kelamin
 * @property int $agama
 * @property int $umur
 * @property string $alamat
 * @property string $no_hp
 * @property string|null $create_time
 * @property string|null $update_time
 * @property int|null $create_by
 * @property int|null $update_by
 */
class Korban extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'korban';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NIK', 'nama_korban', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'umur', 'alamat', 'no_hp'], 'required'],
            [['tanggal_lahir', 'create_time', 'update_time'], 'safe'],
            [['jenis_kelamin', 'agama', 'umur', 'create_by', 'update_by'], 'integer'],
            [['alamat'], 'string'],
            [['NIK'], 'string', 'max' => 18],
            [['nama_korban'], 'string', 'max' => 50],
            [['tempat_lahir'], 'string', 'max' => 30],
            [['no_hp'], 'string', 'max' => 13],
            [['NIK'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NIK' => 'Nik',
            'nama_korban' => 'Nama Korban',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'umur' => 'Umur',
            'alamat' => 'Alamat',
            'no_hp' => 'No Hp',
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

    public function getdatakorban(){
        $data = Korban::find()-> all();
        $dropDown = \yii\helpers\ArrayHelper::map($data, 'NIK','nama_korban');
        return $dropDown;
    }
}
