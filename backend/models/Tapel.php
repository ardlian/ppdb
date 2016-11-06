<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tapel".
 *
 * @property string $tapel
 * @property integer $kd_tapel
 * @property string $status
 * @property integer $daya_tampung
 * @property string $tahun
 */
class Tapel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tapel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tapel', 'daya_tampung', 'tahun'], 'required'],
            [['status'], 'string'],
            [['daya_tampung'], 'integer'],
            [['tahun', 'nip_ket','nip_sek','nip_kepsek','sek_ppdb','ket_ppdb','kepsek',], 'safe'],
            [['tapel'], 'string', 'max' => 9],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tapel' => 'Tapel',
            'kd_tapel' => 'Kd Tapel',
            'status' => 'Status',
            'daya_tampung' => 'Daya Tampung',
            'nip_ketua' => 'NIP',
			'nip_sek' => 'NIP',
            'nip_kepsek' => 'NIP',
            'sek_ppdb' => 'Sekertaris PPDB',
            'ket_ppdb' => 'Ketua PPDB',
            'kepsek' => 'Kepala Sekolah',
        ];
    }
}
