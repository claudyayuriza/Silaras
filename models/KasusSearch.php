<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kasus;

/**
 * KasusSearch represents the model behind the search form of `app\models\Kasus`.
 */
class KasusSearch extends Kasus
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_register', 'NIK_korban', 'nama_pelaku', 'alamat_kejadian', 'hub_korban', 'tanggal_kejadian', 'tanggal_pelaporan', 'deskripsi_kasus', 'tkp', 'desa_kelurahan', 'kab_kota'], 'safe'],
            [['jenis_kelamin', 'usia_pelaku', 'kategori_kasus'], 'integer'],
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
        $query = Kasus::find();

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
            'jenis_kelamin' => $this->jenis_kelamin,
            'usia_pelaku' => $this->usia_pelaku,
            'tanggal_kejadian' => $this->tanggal_kejadian,
            'tanggal_pelaporan' => $this->tanggal_pelaporan,
            'kategori_kasus' => $this->kategori_kasus,
        ]);

        $query->andFilterWhere(['like', 'no_register', $this->no_register])
            ->andFilterWhere(['like', 'NIK_korban', $this->NIK_korban])
            ->andFilterWhere(['like', 'nama_pelaku', $this->nama_pelaku])
            ->andFilterWhere(['like', 'alamat_kejadian', $this->alamat_kejadian])
            ->andFilterWhere(['like', 'hub_korban', $this->hub_korban])
            ->andFilterWhere(['like', 'deskripsi_kasus', $this->deskripsi_kasus])
            ->andFilterWhere(['like', 'tkp', $this->tkp])
            ->andFilterWhere(['like', 'desa_kelurahan', $this->desa_kelurahan])
            ->andFilterWhere(['like', 'kab_kota', $this->kab_kota]);

        return $dataProvider;
    }
}
