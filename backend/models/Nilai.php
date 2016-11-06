<?php

namespace backend\models;
use backend\models\CalonSiswa;
use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "nilai".
 *
 * @property integer $id_nilai
 * @property integer $kd_tapel
 * @property integer $kd_calon_siswa
 * @property string $no_daftar
 * @property string $status
 * @property string $b_ina
 * @property string $b_ing
 * @property string $mat
 * @property string $ipa
 * @property string $prestasi
 * @property string $domisili
 * @property string $total
 * @property string $postdate
 * @property integer $id_user
 *
 * @property CalonSiswa $noDaftar
 * @property Tapel $kdTapel
 * @property User $idUser
 */
class Nilai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nilai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['b_ina', 'b_ing', 'mat', 'ipa', 'id_user'], 'required'],
            [['kd_tapel', 'kd_calon_siswa', 'id_user', 'id_prestasi', 'id_domisili'], 'integer'],
            [['status', 'pencabutan'], 'string'],
            [['b_ina', 'b_ing', 'mat', 'ipa', 'prestasi', 'domisili', 'total'], 'number'],
            [['kd_tapel', 'postdate', 'tgl_cabut', 'total','kd_calon_siswa', 'no_daftar', 'id_user'], 'safe'],
            [['no_daftar'], 'string', 'max' => 50],
            [['kd_tapel'], 'exist', 'skipOnError' => true, 'targetClass' => Tapel::className(), 'targetAttribute' => ['kd_tapel' => 'kd_tapel']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }
	
	//scenario custom while update
	public function scenarios()
    {
		$scenarios = parent::scenarios();
        $scenarios['update'] = ['b_ina', 'b_ing', 'mat', 'ipa', 'prestasi', 'domisili', 'total', 'id_user', 'id_prestasi', 'id_domisili'];//Scenario Values Only Accepted
		$scenarios['pencabutan'] = [ 'pencabutan','tgl_cabut'];//Scenario Values Only Accepted
		$scenarios['penarikan'] = [ 'pencabutan','tgl_cabut'];//Scenario Values Only Accepted
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_nilai' => 'Id Nilai',
            'kd_tapel' => 'Tahun Pelajaran',
            'kd_calon_siswa' => 'Kd Calon Siswa',
            'no_daftar' => 'No Daftar',
            'status' => 'Status',
            'b_ina' => 'Bahasa Indonesia',
            'b_ing' => 'Bahasa Inggris',
            'mat' => 'Matematika',
            'ipa' => 'IPA',
            'prestasi' => 'Prestasi',
            'domisili' => 'Domisili',
            'total' => 'Total',
            'postdate' => 'Tanggal Daftar',
            'id_user' => 'Id User',
			'pencabutan' => 'Status Pendaftaran',
			'totalUn' =>'Total UN',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
  //  public function getNoDaftar()
  //  {
  //      return $this->hasOne(CalonSiswa::className(), ['no_daftar' => 'no_daftar']);
  //  }
    /**
     *fungsi rangking
     */
    public function getRangking($noDaftar)
    {
		$connection = \Yii::$app->db;
		$model = $connection->createCommand("SELECT id_nilai, kd_calon_siswa, no_daftar, total, FIND_IN_SET( total, (    
					SELECT GROUP_CONCAT( total
					ORDER BY total DESC ) 
					FROM nilai )
					) AS rank
					FROM nilai
					WHERE no_daftar = $noDaftar");
		$rangk = $model->queryOne();
        return $rangk;
    }
	
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKdTapel()
    {
        return $this->hasOne(Tapel::className(), ['kd_tapel' => 'kd_tapel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
	
	    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKdCalonSiswa()
    {
        return $this->hasOne(CalonSiswa::className(), ['id_calon' => 'kd_calon_siswa']);
    }
		
	public function getJmlPendaftar()
    {
         return $this->getKdCalonSiswa()->count();
    }
	
	public function getJmlPendaftarToday()
    {
        return $this->hasOne(CalonSiswa::className(), ['id_calon' => 'kd_calon_siswa'])->count();
    }
	
	public function getNilaiTertinggi()
    {
		
        return ArrayHelper::getValue(Nilai::find()->where(array('kd_tapel'=> 1, 'pencabutan'=>'0'))->orderBy('total DESC')->one(), 'total');
    }
	
	public function getNilaiTerendah()
    {
        return ArrayHelper::getValue(Nilai::find()->where(array('kd_tapel'=> 1, 'pencabutan'=>'0'))->orderBy('total ASC')->one(), 'total');
    }
}
