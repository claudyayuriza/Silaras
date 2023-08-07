<?php

namespace app\models;

use Yii;
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

    public function TotalKorbanbyYear()
    {
        $tahun = date('Y');

        $sql = "
        SELECT
            SUM(CASE WHEN jenis_kelamin=1 THEN 1 ELSE 0 END) as 'Laki-Laki',
            SUM(CASE WHEN jenis_kelamin=2 THEN 1 ELSE 0 END) as 'Perempuan'
        FROM t_korban
        LEFT JOIN t_kasus ON t_kasus.id_kasus = t_korban.id_kasus
        WHERE year(tanggal_pelaporan)=$tahun
        GROUP BY t_korban.jenis_kelamin;
        ";
        $data = Yii::$app->db->createCommand($sql)->queryOne();
        return $data;
    }
}
