<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "domisili".
 *
 * @property integer $id_domisili
 * @property string $ket
 * @property string $poin
 * @property integer $kd_tapel
 */
class Domisili extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'domisili';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['poin'], 'number'],
            [['kd_tapel'], 'required'],
            [['kd_tapel'], 'integer'],
            [['ket'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_domisili' => 'Id Domisili',
            'ket' => 'Ket',
            'poin' => 'Poin',
            'kd_tapel' => 'Kd Tapel',
        ];
    }
}
