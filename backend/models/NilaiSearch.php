<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Nilai;
use yii\data\sqlDataProvider;

/**
 * NilaiSearch represents the model behind the search form about `backend\models\Nilai`.
 */
class NilaiSearch extends Nilai
{
	   public $kdCalonSiswa;
	  public $totalUn;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nilai', 'kd_tapel', 'kd_calon_siswa', 'id_user'], 'integer'],
            [['no_daftar', 'status', 'postdate'], 'safe'],
            [['b_ina', 'b_ing', 'mat', 'ipa', 'prestasi', 'domisili', 'total','totalUn'], 'number'],
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
        $query = Nilai::find()->where(['pencabutan' => '0'])->orderBy(['total'=> SORT_DESC]);

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
            'id_nilai' => $this->id_nilai,
            'kd_tapel' => $this->kd_tapel,
            'kd_calon_siswa' => $this->kd_calon_siswa,
            'b_ina' => $this->b_ina,
            'b_ing' => $this->b_ing,
            'mat' => $this->mat,
            'ipa' => $this->ipa,
            'prestasi' => $this->prestasi,
            'domisili' => $this->domisili,
            'total' => $this->total,
            'postdate' => $this->postdate,
            'id_user' => $this->id_user,
			'pencabutan' => $this->pencabutan,
        ]);

        $query->andFilterWhere(['like', 'no_daftar', $this->no_daftar])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
	
	public function cetak($postdate, $kd_tapel)
    {
		 $query = (new \yii\db\Query())
            ->select("m.nisn, m.kelamin , m.sekolah_asal, m.tgl_daftar ,m.nama, n.no_daftar, n.domisili, n.prestasi, n.total,(n.ipa + n.mat + n.b_ina + n.b_ing) AS totalUn")
            ->from('nilai n, calon_siswa m')
            ->where('n.kd_calon_siswa = m.id_calon')
			->orderBy(['n.total'=> SORT_DESC]);
			
        //$query = Nilai::find()->where(['pencabutan' => '0','kd_tapel' => $this->kd_tapel, 'postdate' < $this->postdate])->orderBy(['total'=> SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination' => [
				'pageSize' => 0,
			],
        ]);

        $this->load($kd_tapel);
		$this->load($postdate);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
          //  'n.id_nilai' => $this->id_nilai,
           'n.kd_tapel' => $kd_tapel,
          //  'n.kd_calon_siswa' => $this->kd_calon_siswa,
         //   'n.b_ina' => $this->b_ina,
          //  'n.b_ing' => $this->b_ing,
          //  'n.mat' => $this->mat,
          //  'n.ipa' => $this->ipa,
         //   'n.prestasi' => $this->prestasi,
         //   'n.domisili' => $this->domisili,
         //   'n.total' => $this->total,
          //  'n.postdate' => $this->postdate,
          //  'n.id_user' => $this->id_user,
			'n.pencabutan' => '0',
        ]);

        $query->andFilterWhere(['<=', 'n.postdate', $postdate]);
           // ->andFilterWhere(['like', 'n.status', $this->status]);

        return $dataProvider;
    }
	
	//$model = User::find()
	//	->select('username')
	//	->asArray()
	//	->where('userid between 1 and 5')
	//	->all();

	
	
	public function terima($params)
    {
		 $query = (new \yii\db\Query())
            ->select("m.kelamin , m.sekolah_asal, m.tgl_daftar ,m.nama, n.kd_calon_siswa, n.no_daftar, n.domisili, n.prestasi, n.total,(n.ipa + n.mat + n.b_ina + n.b_ing) AS totalUn")
            ->from('nilai n, calon_siswa m')
            ->where('n.kd_calon_siswa = m.id_calon')
			->orderBy(['n.total'=> SORT_DESC])
			->limit(216);
			
        //$query = Nilai::find()->where(['pencabutan' => '0','kd_tapel' => $this->kd_tapel, 'postdate' < $this->postdate])->orderBy(['total'=> SORT_DESC]);
		//$dataProvider = new SqlDataProvider([
		//	'sql' => 'SELECT calon_siswa.*, kd_calon_siswa, domisili, prestasi, total, (ipa+mat+b_ina+b_ing) AS totalUn ' . 
		//			 'FROM nilai ' .
		//			 'INNER JOIN calon_siswa ON (nilai.kd_calon_siswa = calon_siswa.id_calon) ' .
		//			 'WHERE nilai.kd_tapel=:author AND nilai.pencabutan=:cbt ' .
		//			 'ORDER BY total ',
		//	'params' => [':author' => 1, ':cbt' => '0'],
		//]);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination' => [
				'pageSize' => 20,
			],
        ]);

       $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
           // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'n.id_nilai' => $this->id_nilai,
           'n.kd_tapel' => 1,
            'n.kd_calon_siswa' => $this->kd_calon_siswa,
            'n.b_ina' => $this->b_ina,
            'n.b_ing' => $this->b_ing,
            'n.mat' => $this->mat,
            'n.ipa' => $this->ipa,
            'n.prestasi' => $this->prestasi,
            'n.domisili' => $this->domisili,
            'n.total' => $this->total,
            'n.postdate' => $this->postdate,
            'n.id_user' => $this->id_user,
			'n.pencabutan' => '0',
        ]);

       // $query->andFilterWhere(['<=', 'n.postdate', $postdate]);
           // ->andFilterWhere(['like', 'n.status', $this->status]);

        return $dataProvider;
    }
}
