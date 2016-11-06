<?php

namespace backend\models;

use Yii;

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
 * @property CalonSiswa $kdCalonSiswa
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
            [['kd_tapel', 'kd_calon_siswa', 'no_daftar', 'b_ina', 'b_ing', 'mat', 'ipa', 'postdate', 'id_user'], 'required'],
            [['kd_tapel', 'kd_calon_siswa', 'id_user'], 'integer'],
            [['status'], 'string'],
            [['b_ina', 'b_ing', 'mat', 'ipa', 'prestasi', 'domisili', 'total'], 'number'],
            [['postdate'], 'safe'],
            [['no_daftar'], 'string', 'max' => 50],
            [['kd_calon_siswa'], 'exist', 'skipOnError' => true, 'targetClass' => CalonSiswa::className(), 'targetAttribute' => ['kd_calon_siswa' => 'id_calon']],
            [['no_daftar'], 'exist', 'skipOnError' => true, 'targetClass' => CalonSiswa::className(), 'targetAttribute' => ['no_daftar' => 'no_daftar']],
            [['kd_tapel'], 'exist', 'skipOnError' => true, 'targetClass' => Tapel::className(), 'targetAttribute' => ['kd_tapel' => 'kd_tapel']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_nilai' => 'Id Nilai',
            'kd_tapel' => 'Kd Tapel',
            'kd_calon_siswa' => 'Kd Calon Siswa',
            'no_daftar' => 'No Daftar',
            'status' => 'Status',
            'b_ina' => 'Bahasa Indonesia',
            'b_ing' => 'Bahasa Inggris',
            'mat' => 'Matematika',
            'ipa' => 'IPA',
            'prestasi' => 'Bonus Prestasi',
            'domisili' => 'Bonus Domisili',
            'total' => 'Total',
            'postdate' => 'Postdate',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKdCalonSiswa()
    {
        return $this->hasOne(CalonSiswa::className(), ['id_calon' => 'kd_calon_siswa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoDaftar()
    {
        return $this->hasOne(CalonSiswa::className(), ['no_daftar' => 'no_daftar']);
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
}
