<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tandatangan;

/**
 * TandatanganSearch represents the model behind the search form of `app\models\Tandatangan`.
 */
class TandatanganSearch extends Tandatangan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pejabat'], 'integer'],
            [['nip', 'nama_pejabat', 'jabatan'], 'safe'],
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
        $query = Tandatangan::find();

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
            'id_pejabat' => $this->id_pejabat,
            'nip' => $this->nip,
        ]);

        $query->andFilterWhere(['like', 'nama_pejabat', $this->nama_pejabat])
            ->andFilterWhere(['like', 'jabatan', $this->jabatan]);

        return $dataProvider;
    }
}
