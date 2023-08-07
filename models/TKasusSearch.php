<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TKasus;

/**
 * TKasusSearch represents the model behind the search form of `app\models\TKasus`.
 */
class TKasusSearch extends TKasus
{
    /**
     * {@inheritdoc}
     */
    public $bulan;
    public $tahun;
    public function rules()
    {
        return [
            [['id_kasus', 'kategori_kasus', 'status_kasus', 'create_by', 'update_by'], 'integer'],
            [['no_register', 'tanggal_kejadian', 'tanggal_pelaporan', 'deskripsi_kasus', 'tkp', 'desa_kelurahan', 'kab_kota', 'create_at', 'update_at', 'bulan', 'tahun'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TKasus::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_kasus' => $this->id_kasus,
            'tanggal_kejadian' => $this->tanggal_kejadian,
            'tanggal_pelaporan' => $this->tanggal_pelaporan,
            'kategori_kasus' => $this->kategori_kasus,
            'status_kasus' => $this->status_kasus,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'create_by' => $this->create_by,
            'update_by' => $this->update_by,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
        ]);

        $query->andFilterWhere(['like', 'no_register', $this->no_register])
            ->andFilterWhere(['like', 'deskripsi_kasus', $this->deskripsi_kasus])
            ->andFilterWhere(['like', 'pelayanan', $this->pelayanan])
            ->andFilterWhere(['like', 'deskripsi_pelayanan', $this->deskripsi_pelayanan])
            ->andFilterWhere(['like', 'tkp', $this->tkp])
            ->andFilterWhere(['like', 'desa_kelurahan', $this->desa_kelurahan])
            ->andFilterWhere(['like', 'kab_kota', $this->kab_kota]);

        return $dataProvider;
    }

    public function TotalKasusbyYear()
    {
        $tahun = date('Y');

        $sql = "
        SELECT nama_kategori, ifnull(jumlahkasus,0) as jumlahkasus
        FROM kategori
        LEFT JOIN (
            SELECT kategori_kasus, COUNT(*) as jumlahkasus
            FROM t_kasus
            WHERE year(tanggal_pelaporan)=$tahun
            GROUP BY kategori_kasus
            ) kasus ON kasus.kategori_kasus = kategori.id_kategori
        
        ";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }
}
