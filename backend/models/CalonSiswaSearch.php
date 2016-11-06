<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CalonSiswa;

/**
 * CalonSiswaSearch represents the model behind the search form about `backend\models\CalonSiswa`.
 */
class CalonSiswaSearch extends CalonSiswa
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_tapel', 'id_calon', 'agama', 'anak_ke', 'kerja_ayah', 'pen_ayah', 'kerja_ibu', 'pend_ibu', 'kerja_wali', 'pend_wali', 'nisn', 'id_pendaftar'], 'integer'],
            [['no_daftar', 'nama', 'tmpat_lahir', 'tgl_lahir', 'kelamin', 'hp', 'alamat', 'nama_ayah', 'nama_ibu', 'alamat_ortu', 'nama_wali', 'alamat_wali', 'sekolah_asal', 'alamat_sekolah', 'no_sttb', 'hp_ortu', 'hp_wali', 'thn_lulus', 'tgl_daftar', 'status_daftar', 'status_diterima', 'pencabutan', 'validasi', 'tb', 'bb', 'id_validator', 'status_sekolah', 'syarat_foto', 'syarat_sttb', 'syarat_skhus', 'syarat_sertifikat', 'syarat_kk', 'syarat_akta'], 'safe'],
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
    public function cabut($params)
    {

        $query = CalonSiswa::find();

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
            'id_calon' => $this->id_calon,
            'tgl_lahir' => $this->tgl_lahir,
            'agama' => $this->agama,
			'kelamin' => $this->kelamin,
			'pencabutan' => $this->pencabutan,
			'no_daftar' => $this->no_daftar,
            'anak_ke' => $this->anak_ke,
            'kerja_ayah' => $this->kerja_ayah,
            'pen_ayah' => $this->pen_ayah,
			'kerja_ibu' => $this->kerja_ibu,
            'pend_ibu' => $this->pend_ibu,
            'kerja_wali' => $this->kerja_wali,
            'pend_wali' => $this->pend_wali,
            'nisn' => $this->nisn,
            'tgl_daftar' => $this->tgl_daftar,
            'id_pendaftar' => $this->id_pendaftar,
        ]);

        $query->andFilterWhere(['like', 'no_daftar', $this->no_daftar])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tmpat_lahir', $this->tmpat_lahir])
            ->andFilterWhere(['like', 'kelamin', $this->kelamin])
            ->andFilterWhere(['like', 'hp', $this->hp])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'nama_ayah', $this->nama_ayah])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'alamat_ortu', $this->alamat_ortu])
            ->andFilterWhere(['like', 'nama_wali', $this->nama_wali])
            ->andFilterWhere(['like', 'alamat_wali', $this->alamat_wali])
            ->andFilterWhere(['like', 'sekolah_asal', $this->sekolah_asal])
            ->andFilterWhere(['like', 'alamat_sekolah', $this->alamat_sekolah])
            ->andFilterWhere(['like', 'no_sttb', $this->no_sttb])
            ->andFilterWhere(['like', 'hp_ortu', $this->hp_ortu])
            ->andFilterWhere(['like', 'hp_wali', $this->hp_wali])
            ->andFilterWhere(['like', 'thn_lulus', $this->thn_lulus])
            ->andFilterWhere(['like', 'status_daftar', $this->status_daftar])
            ->andFilterWhere(['like', 'status_diterima', $this->status_diterima])
            ->andFilterWhere(['like', 'pencabutan', $this->pencabutan])
            ->andFilterWhere(['like', 'validasi', $this->validasi])
            ->andFilterWhere(['like', 'tb', $this->tb])
            ->andFilterWhere(['like', 'bb', $this->bb])
            ->andFilterWhere(['like', 'id_validator', $this->id_validator])
            ->andFilterWhere(['like', 'status_sekolah', $this->status_sekolah])
            ->andFilterWhere(['like', 'syarat_foto', $this->syarat_foto])
            ->andFilterWhere(['like', 'syarat_sttb', $this->syarat_sttb])
            ->andFilterWhere(['like', 'syarat_skhus', $this->syarat_skhus])
            ->andFilterWhere(['like', 'syarat_sertifikat', $this->syarat_sertifikat])
            ->andFilterWhere(['like', 'syarat_kk', $this->syarat_kk])
            ->andFilterWhere(['like', 'syarat_akta', $this->syarat_akta]);

        return $dataProvider;
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
		//hanya yg input yg bisa lihat
        //$query = CalonSiswa::find()->where(['id_pendaftar' => Yii::$app->user->identity->id]);

		//semu pendaftar bisa lihat, edit, delet, walaupun tidak input
		$query = CalonSiswa::find();
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
            'id_calon' => $this->id_calon,
            'tgl_lahir' => $this->tgl_lahir,
            'agama' => $this->agama,
			'kelamin' => $this->kelamin,
			'pencabutan' => $this->pencabutan,
			'no_daftar' => $this->no_daftar,
            'anak_ke' => $this->anak_ke,
            'kerja_ayah' => $this->kerja_ayah,
            'pen_ayah' => $this->pen_ayah,
			'kerja_ibu' => $this->kerja_ibu,
            'pend_ibu' => $this->pend_ibu,
            'kerja_wali' => $this->kerja_wali,
            'pend_wali' => $this->pend_wali,
            'nisn' => $this->nisn,
            'tgl_daftar' => $this->tgl_daftar,
            'id_pendaftar' => $this->id_pendaftar,
        ]);

        $query->andFilterWhere(['like', 'no_daftar', $this->no_daftar])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tmpat_lahir', $this->tmpat_lahir])
            ->andFilterWhere(['like', 'kelamin', $this->kelamin])
            ->andFilterWhere(['like', 'hp', $this->hp])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'nama_ayah', $this->nama_ayah])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'alamat_ortu', $this->alamat_ortu])
            ->andFilterWhere(['like', 'nama_wali', $this->nama_wali])
            ->andFilterWhere(['like', 'alamat_wali', $this->alamat_wali])
            ->andFilterWhere(['like', 'sekolah_asal', $this->sekolah_asal])
            ->andFilterWhere(['like', 'alamat_sekolah', $this->alamat_sekolah])
            ->andFilterWhere(['like', 'no_sttb', $this->no_sttb])
            ->andFilterWhere(['like', 'hp_ortu', $this->hp_ortu])
            ->andFilterWhere(['like', 'hp_wali', $this->hp_wali])
            ->andFilterWhere(['like', 'thn_lulus', $this->thn_lulus])
            ->andFilterWhere(['like', 'status_daftar', $this->status_daftar])
            ->andFilterWhere(['like', 'status_diterima', $this->status_diterima])
            ->andFilterWhere(['like', 'pencabutan', $this->pencabutan])
            ->andFilterWhere(['like', 'validasi', $this->validasi])
            ->andFilterWhere(['like', 'tb', $this->tb])
            ->andFilterWhere(['like', 'bb', $this->bb])
            ->andFilterWhere(['like', 'id_validator', $this->id_validator])
            ->andFilterWhere(['like', 'status_sekolah', $this->status_sekolah])
            ->andFilterWhere(['like', 'syarat_foto', $this->syarat_foto])
            ->andFilterWhere(['like', 'syarat_sttb', $this->syarat_sttb])
            ->andFilterWhere(['like', 'syarat_skhus', $this->syarat_skhus])
            ->andFilterWhere(['like', 'syarat_sertifikat', $this->syarat_sertifikat])
            ->andFilterWhere(['like', 'syarat_kk', $this->syarat_kk])
            ->andFilterWhere(['like', 'syarat_akta', $this->syarat_akta]);

        return $dataProvider;
    }
	
	/**
     * sort untuk menu cetak buku nomor pendaftaran
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function nomor($postdate, $kd_tapel)
    {

        $query = CalonSiswa::find()->where([
		'kd_tapel' => $kd_tapel
		]);

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

     

        $query->andFilterWhere(['<=', 'tgl_daftar', $postdate]);


        return $dataProvider;
    }
	
	 public function cetakcabut($postdate, $kd_tapel)
    {

        $query = CalonSiswa::find()->where([
		'kd_tapel' => $kd_tapel,
		'pencabutan' => 1,
		]);

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

     

        $query->andFilterWhere(['<=', 'tgl_daftar', $postdate]);


        return $dataProvider;
    }
	
	 /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function terima($params)
    {

        $query = CalonSiswa::find()->limit(216)->all();

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
            'id_calon' => $this->id_calon,
            'tgl_lahir' => $this->tgl_lahir,
            'agama' => $this->agama,
			'kelamin' => $this->kelamin,
			'pencabutan' => $this->pencabutan,
			'no_daftar' => $this->no_daftar,
            'anak_ke' => $this->anak_ke,
            'kerja_ayah' => $this->kerja_ayah,
            'pen_ayah' => $this->pen_ayah,
			'kerja_ibu' => $this->kerja_ibu,
            'pend_ibu' => $this->pend_ibu,
            'kerja_wali' => $this->kerja_wali,
            'pend_wali' => $this->pend_wali,
            'nisn' => $this->nisn,
            'tgl_daftar' => $this->tgl_daftar,
            'id_pendaftar' => $this->id_pendaftar,
        ]);

        $query->andFilterWhere(['like', 'no_daftar', $this->no_daftar])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tmpat_lahir', $this->tmpat_lahir])
            ->andFilterWhere(['like', 'kelamin', $this->kelamin])
            ->andFilterWhere(['like', 'hp', $this->hp])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'nama_ayah', $this->nama_ayah])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'alamat_ortu', $this->alamat_ortu])
            ->andFilterWhere(['like', 'nama_wali', $this->nama_wali])
            ->andFilterWhere(['like', 'alamat_wali', $this->alamat_wali])
            ->andFilterWhere(['like', 'sekolah_asal', $this->sekolah_asal])
            ->andFilterWhere(['like', 'alamat_sekolah', $this->alamat_sekolah])
            ->andFilterWhere(['like', 'no_sttb', $this->no_sttb])
            ->andFilterWhere(['like', 'hp_ortu', $this->hp_ortu])
            ->andFilterWhere(['like', 'hp_wali', $this->hp_wali])
            ->andFilterWhere(['like', 'thn_lulus', $this->thn_lulus])
            ->andFilterWhere(['like', 'status_daftar', $this->status_daftar])
            ->andFilterWhere(['like', 'status_diterima', $this->status_diterima])
            ->andFilterWhere(['like', 'pencabutan', $this->pencabutan])
            ->andFilterWhere(['like', 'validasi', $this->validasi])
            ->andFilterWhere(['like', 'tb', $this->tb])
            ->andFilterWhere(['like', 'bb', $this->bb])
            ->andFilterWhere(['like', 'id_validator', $this->id_validator])
            ->andFilterWhere(['like', 'status_sekolah', $this->status_sekolah])
            ->andFilterWhere(['like', 'syarat_foto', $this->syarat_foto])
            ->andFilterWhere(['like', 'syarat_sttb', $this->syarat_sttb])
            ->andFilterWhere(['like', 'syarat_skhus', $this->syarat_skhus])
            ->andFilterWhere(['like', 'syarat_sertifikat', $this->syarat_sertifikat])
            ->andFilterWhere(['like', 'syarat_kk', $this->syarat_kk])
            ->andFilterWhere(['like', 'syarat_akta', $this->syarat_akta]);

        return $dataProvider;
    }
}
