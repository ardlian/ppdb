<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "agama".
 *
 * @property integer $id_agama
 * @property string $ket
 *
 * @property CalonSiswa[] $calonSiswas
 */
class Agama extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agama';
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
            'id_agama' => 'Id Agama',
            'ket' => 'Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalonSiswas()
    {
        return $this->hasMany(CalonSiswa::className(), ['agama' => 'id_agama']);
    }
}
