<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TKorban;

/**
 * TKorbanSearch represents the model behind the search form of `app\models\TKorban`.
 */
class TKorbanSearch extends TKorban
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_korban', 'jenis_kelamin', 'agama_korban', 'umur_korban', 'id_kasus', 'create_by', 'update_by'], 'integer'],
            [['nik', 'nama_korban', 'tempat_lahir', 'tanggal_lahir', 'alamat_korban', 'no_hp', 'create_at', 'update_at'], 'safe'],
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
        $query = TKorban::find();

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
            'id_korban' => $this->id_korban,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama_korban' => $this->agama_korban,
            'umur_korban' => $this->umur_korban,
            'id_kasus' => $this->id_kasus,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'create_by' => $this->create_by,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama_korban', $this->nama_korban])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'alamat_korban', $this->alamat_korban])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp]);

        return $dataProvider;
    }
}
