<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Prestasi;

/**
 * PrestasiSearch represents the model behind the search form about `backend\models\Prestasi`.
 */
class PrestasiSearch extends Prestasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_prestasi', 'kd_tapel'], 'integer'],
            [['tingkat', 'peringkat', 'wilayah', 'ket'], 'safe'],
            [['skor'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Prestasi::find();

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
            'id_prestasi' => $this->id_prestasi,
            'skor' => $this->skor,
            'kd_tapel' => $this->kd_tapel,
        ]);

        $query->andFilterWhere(['like', 'tingkat', $this->tingkat])
            ->andFilterWhere(['like', 'peringkat', $this->peringkat])
            ->andFilterWhere(['like', 'wilayah', $this->wilayah])
            ->andFilterWhere(['like', 'ket', $this->ket]);

        return $dataProvider;
    }
}
