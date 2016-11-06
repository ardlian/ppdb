<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pekerjaan".
 *
 * @property integer $id_kerja
 * @property string $ket
 */
class Pekerjaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pekerjaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ket'], 'required'],
            [['ket'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kerja' => 'Id Kerja',
            'ket' => 'Ket',
        ];
    }
	
		    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekerjaanBpk()
    {
        return $this->hasMany(CalonSiswa::className(), ['kerja_ayah' => 'id_kerja']);
    }
		    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekerjaanIbu()
    {
        return $this->hasMany(CalonSiswa::className(), ['kerja_ibu' => 'id_kerja']);
    }
		    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekerjaanWali()
    {
        return $this->hasMany(CalonSiswa::className(), ['kerja_wali' => 'id_kerja']);
    }
}
