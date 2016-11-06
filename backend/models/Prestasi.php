<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "prestasi".
 *
 * @property integer $id_prestasi
 * @property string $tingkat
 * @property string $peringkat
 * @property string $wilayah
 * @property string $skor
 * @property string $ket
 * @property integer $kd_tapel
 */
class Prestasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skor'], 'number'],
            [['kd_tapel'], 'required'],
            [['kd_tapel'], 'integer'],
            [['tingkat', 'peringkat', 'wilayah'], 'string', 'max' => 2],
            [['ket'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_prestasi' => 'Id Prestasi',
            'tingkat' => 'Tingkat',
            'peringkat' => 'Peringkat',
            'wilayah' => 'Wilayah',
            'skor' => 'Skor',
            'ket' => 'Ket',
            'kd_tapel' => 'Kd Tapel',
        ];
    }
}
