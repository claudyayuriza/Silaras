<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Korban;

/**
 * KorbanSearch represents the model behind the search form of `app\models\Korban`.
 */
class KorbanSearch extends Korban
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NIK', 'nama_korban', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'no_hp'], 'safe'],
            [['jenis_kelamin', 'agama', 'umur'], 'integer'],
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
        $query = Korban::find();

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
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama' => $this->agama,
            'umur' => $this->umur,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'create_by' => $this->create_by,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'NIK', $this->NIK])
            ->andFilterWhere(['like', 'nama_korban', $this->nama_korban])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp]);

        return $dataProvider;
    }
}
