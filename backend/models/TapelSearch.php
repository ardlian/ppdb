<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tapel;

/**
 * TapelSearch represents the model behind the search form about `backend\models\Tapel`.
 */
class TapelSearch extends Tapel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tapel', 'status', 'tahun'], 'safe'],
            [['kd_tapel', 'daya_tampung'], 'integer'],
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
        $query = Tapel::find();

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
            'kd_tapel' => $this->kd_tapel,
            'daya_tampung' => $this->daya_tampung,
            'tahun' => $this->tahun,
        ]);

        $query->andFilterWhere(['like', 'tapel', $this->tapel])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
