<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tandatangan".
 *
 * @property int $id_pejabat
 * @property int $nip
 * @property string $nama_pejabat
 * @property string $jabatan
 */
class Tandatangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tandatangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nip', 'nama_pejabat', 'jabatan'], 'required'],
            [['nip'], 'string', 'max' => 30],
            [['nama_pejabat', 'jabatan'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pejabat' => 'Id Pejabat',
            'nip' => 'Nip',
            'nama_pejabat' => 'Nama Pejabat',
            'jabatan' => 'Jabatan',
        ];
    }
}
