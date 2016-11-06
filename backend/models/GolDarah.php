<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gol_darah".
 *
 * @property integer $id_agama
 * @property string $ket
 */
class GolDarah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gol_darah';
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
}
