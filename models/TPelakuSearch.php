<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TPelaku;

/**
 * TPelakuSearch represents the model behind the search form of `app\models\TPelaku`.
 */
class TPelakuSearch extends TPelaku
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pelaku', 'id_kasus', 'jenis_kelamin_pelaku', 'agama_pelaku', 'umur_pelaku', 'create_at', 'update_at', 'create_by', 'update_by'], 'integer'],
            [['nik', 'nama_pelaku', 'tempat_lahir_pelaku', 'tanggal_lahir_pelaku', 'alamat_pelaku', 'hub_korban'], 'safe'],
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
        $query = TPelaku::find();

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
            'id_pelaku' => $this->id_pelaku,
            'id_kasus' => $this->id_kasus,
            'tanggal_lahir_pelaku' => $this->tanggal_lahir_pelaku,
            'jenis_kelamin_pelaku' => $this->jenis_kelamin_pelaku,
            'agama_pelaku' => $this->agama_pelaku,
            'umur_pelaku' => $this->umur_pelaku,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'create_by' => $this->create_by,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama_pelaku', $this->nama_pelaku])
            ->andFilterWhere(['like', 'tempat_lahir_pelaku', $this->tempat_lahir_pelaku])
            ->andFilterWhere(['like', 'alamat_pelaku', $this->alamat_pelaku])
            ->andFilterWhere(['like', 'hub_korban', $this->hub_korban]);

        return $dataProvider;
    }
}
