<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pendidikan".
 *
 * @property integer $id_pend
 * @property string $ket
 */
class Pendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pendidikan';
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
            'id_pend' => 'Id Pend',
            'ket' => 'Ket',
        ];
    }
	
	    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendBpk()
    {
        return $this->hasMany(CalonSiswa::className(), ['pen_ayah' => 'id_pend']);
    }
		    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendIbu()
    {
        return $this->hasMany(CalonSiswa::className(), ['pend_ibu' => 'id_pend']);
    }
		    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendWali()
    {
        return $this->hasMany(CalonSiswa::className(), ['pend_wali' => 'id_pend']);
    }
}
