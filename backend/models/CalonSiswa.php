<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "calon_siswa".
 *
 * @property integer $kd_tapel
 * @property integer $id_calon
 * @property string $no_daftar
 * @property string $nama
 * @property string $tmpat_lahir
 * @property string $tgl_lahir
 * @property integer $agama
 * @property string $kelamin
 * @property integer $anak_ke
 * @property string $hp
 * @property string $alamat
 * @property string $nama_ayah
 * @property integer $kerja_ayah
 * @property integer $pen_ayah
 * @property string $nama_ibu
 * @property integer $kerja_ibu
 * @property integer $pend_ibu
 * @property string $alamat_ortu
 * @property string $nama_wali
 * @property integer $kerja_wali
 * @property integer $pend_wali
 * @property string $alamat_wali
 * @property string $sekolah_asal
 * @property string $alamat_sekolah
 * @property string $no_sttb
 * @property integer $nisn
 * @property string $hp_ortu
 * @property string $hp_wali
 * @property string $thn_lulus
 * @property string $tgl_daftar
 * @property string $status_daftar
 * @property string $status_diterima
 * @property string $pencabutan
 * @property string $validasi
 * @property string $tb
 * @property string $bb
 * @property integer $id_pendaftar
 * @property string $id_validator
 * @property string $status_sekolah
 * @property string $syarat_foto
 * @property string $syarat_sttb
 * @property string $syarat_skhus
 * @property string $syarat_sertifikat
 * @property string $syarat_kk
 * @property string $syarat_akta
 *
 * @property Agama $agama0
 * @property User $idPendaftar
 * @property Tapel $kdTapel
 * @property Nilai[] $nilais
 * @property Nilai[] $nilais0
 */
class CalonSiswa extends \yii\db\ActiveRecord
{
	const GENDER_MALE = 1;
	const GENDER_FEMALE = 0;
	const STATUS_DICABUT = 1;
	const STATUS_DAFTAR = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calon_siswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_tapel', 'nama', 'tmpat_lahir', 'tgl_lahir', 'agama', 'anak_ke', 'alamat', 'sekolah_asal', 'nisn', 'thn_lulus', 'tgl_daftar', 'id_pendaftar'], 'required'],
            [['kd_tapel', 'agama', 'anak_ke', 'kerja_ayah', 'pen_ayah', 'kerja_ibu', 'pend_ibu', 'kerja_wali', 'pend_wali', 'id_pendaftar'], 'integer'],
            [['tgl_lahir', 'tgl_daftar', 'no_daftar', 'tgl_cabut'], 'safe'],
            [['kelamin', 'status_daftar', 'status_diterima', 'pencabutan', 'validasi', 'status_sekolah', 'syarat_foto', 'syarat_sttb', 'syarat_skhus', 'syarat_sertifikat', 'syarat_kk', 'syarat_akta', 'syarat_dinas_asal', 'syarat_dinas_batang'], 'string'],
            [['no_daftar'], 'string', 'max' => 50],
            [['nama', 'hp', 'alamat', 'nama_ayah', 'nama_ibu', 'alamat_ortu', 'nama_wali', 'alamat_wali', 'sekolah_asal', 'alamat_sekolah', 'no_sttb', 'hp_ortu', 'hp_wali'], 'string', 'max' => 255],
            [['tmpat_lahir', 'thn_lulus', 'tb', 'bb'], 'string', 'max' => 4],
            [['id_validator'], 'string', 'max' => 11],
            [['agama'], 'exist', 'skipOnError' => true, 'targetClass' => Agama::className(), 'targetAttribute' => ['agama' => 'id_agama']],
            [['id_pendaftar'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_pendaftar' => 'id']],
            [['kd_tapel'], 'exist', 'skipOnError' => true, 'targetClass' => Tapel::className(), 'targetAttribute' => ['kd_tapel' => 'kd_tapel']],
        ];
    }
	
		//scenario custom while update
	public function scenarios()
    {
		$scenarios = parent::scenarios();
        $scenarios['update'] = [ 
            'nama',
            'tmpat_lahir',
            'tgl_lahir',
            'agama',
            'kelamin',
            'anak_ke',
            'hp',
            'alamat',
            'nama_ayah',
            'kerja_ayah',
            'pen_ayah',
            'nama_ibu',
            'kerja_ibu',
            'pend_ibu',
            'alamat_ortu',
            'nama_wali',
            'kerja_wali',
            'pend_wali',
            'alamat_wali',
            'sekolah_asal',
            'alamat_sekolah',
            'no_sttb',
            'nisn',
            'hp_ortu',
            'hp_wali',
            'thn_lulus',
            'tb',
            'bb',
            'status_sekolah',
            'syarat_foto',
            'syarat_sttb',
            'syarat_skhus',
            'syarat_sertifikat',
            'syarat_kk',
            'syarat_akta',
			'syarat_dinas_asal',
			'syarat_dinas_batang',
			'id_pendaftar',
		];//Scenario Values Only Accepted
		 $scenarios['pencabutan'] = [ 'pencabutan', 'tgl_cabut'];//Scenario Values Only Accepted
		 $scenarios['penarikan'] = [ 'pencabutan', 'tgl_cabut'];//Scenario Values Only Accepted
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_tapel' => 'Kd Tapel',
            'id_calon' => 'Id Calon',
            'no_daftar' => 'No Daftar',
            'nama' => 'Nama Lengkap',
            'tmpat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tanggal Lahir',
            'agama' => 'Agama',
            'kelamin' => 'Jenis Kelamin',
            'anak_ke' => 'Anak Ke',
            'hp' => 'Nomor HP',
            'alamat' => 'Alamat',
            'nama_ayah' => 'Nama Ayah',
            'kerja_ayah' => 'Pekerjaan Ayah',
            'pen_ayah' => 'Pendidikan Ayah',
            'nama_ibu' => 'Nama Ibu',
            'kerja_ibu' => 'Pekerjaan Ibu',
            'pend_ibu' => 'Pendidikan Ibu',
            'alamat_ortu' => 'Alamat Ortu',
            'nama_wali' => 'Nama Wali',
            'kerja_wali' => 'Pekerjaan Wali',
            'pend_wali' => 'Pendidikan Wali',
            'alamat_wali' => 'Alamat Wali',
            'sekolah_asal' => 'Asal Sekolah',
            'alamat_sekolah' => 'Alamat Sekolah ',
            'no_sttb' => 'No STTB',
            'nisn' => 'NISN',
            'hp_ortu' => 'Nomor HP Ortu',
            'hp_wali' => 'Nomor HP Wali',
            'thn_lulus' => 'Tahun Lulus',
            'tgl_daftar' => 'Tanggal Daftar',
            'status_daftar' => 'Status Daftar',
            'status_diterima' => 'Status Diterima',
            'pencabutan' => 'Status Daftar',
			'tgl_cabut' => 'Tanggal Pencabutan',
            'validasi' => 'Validasi',
            'tb' => 'Tinggi Badan',
            'bb' => 'Berat Badan',
            'id_pendaftar' => 'Id Pendaftar',
            'id_validator' => 'Id Validator',
            'status_sekolah' => 'Status Sekolah',
            'syarat_foto' => 'Foto Hitam Putih 3x4 (3 lembar)',
            'syarat_sttb' => 'Dokumen STTB',
            'syarat_skhus' => 'Dokumen SKHUS',
            'syarat_sertifikat' => 'Foto Copy Ligalisir Sertifikat Prestasi Akademik/Non Akademik',
            'syarat_kk' => 'Foto Copy Kartu Keluarga',
            'syarat_akta' => 'Foto Copy Akta Kelahiran',
			'syarat_dinas_asal' => 'Surat Keterangan dari Dinas Asal (Bagi Pendaftar Luar KAb)',
            'syarat_dinas_batang' => 'Surat Keterangan dari Dinas Batang (Bagi Pendaftar Luar KAb)',
        ];
    }

	 public function getKerjaAyah()
    {
        return $this->hasOne(Pekerjaan::className(), ['id_kerja' => 'kerja_ayah']);
    }
	    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKerjaIbu()
    {
        return $this->hasOne(Pekerjaan::className(), ['id_kerja' => 'kerja_ibu']);
    }
		    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKerjaWali()
    {
        return $this->hasOne(Pekerjaan::className(), ['id_kerja' => 'kerja_wali']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgama0()
    {
        return $this->hasOne(Agama::className(), ['id_agama' => 'agama']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendidikanAyah()
    {
        return $this->hasOne(Pendidikan::className(), ['id_pend' => 'pen_ayah']);
    }
	    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendidikanIbu()
    {
        return $this->hasOne(Pendidikan::className(), ['id_pend' => 'pend_ibu']);
    }
		    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendidikanWali()
    {
        return $this->hasOne(Pendidikan::className(), ['id_pend' => 'pend_wali']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPendaftar()
    {
        return $this->hasOne(User::className(), ['id' => 'id_pendaftar']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupaten()
    {
        return $this->hasOne(Regencies::className(), ['id' => 'tmpat_lahir']);
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
    public function getNilais()
    {
        return $this->hasMany(Nilai::className(), ['kd_calon_siswa' => 'id_calon']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilais0()
    {
        return $this->hasMany(Nilai::className(), ['no_daftar' => 'no_daftar']);
    }
	

	public function getGender()
	{
	 switch ($this->kelamin)
			{
			case self::GENDER_MALE:
					return 'Laki-Laki';
			case self::GENDER_FEMALE:
					return 'Perempuan';
			}
	}

	/**
	 * @return array genders for dropdown controls
	 */
	public static function getGenders()
	{
			return array(
					self::GENDER_MALE => 'Laki-Laki',
					self::GENDER_FEMALE => 'Perempuan'
			);
	}
	public function getCabut()
	{
	 switch ($this->pencabutan)
			{
			case self::STATUS_DICABUT:
					return 'Dicabut-Laki';
			case self::STATUS_DAFTAR:
					return 'Daftar';
			}
	}
		/**
	 * @return array genders for dropdown controls
	 */
	public static function getCabuts()
	{
			return array(
					self::STATUS_DICABUT => 'Dicabut',
					self::STATUS_DAFTAR => 'Daftar'
			);
	}
	/**
	 * @Get fungsi untuk mendapatkan label
	 */
	public function getGenderLabel()
	{
	   return $this->kelamin == 1 ? 'Laki-Laki' : 'Perempuan';
	}
		public function getFotoLabel()
	{
	   return $this->syarat_foto == 1 ? 'Ya' : 'Tidak';
	}
		public function getSttbLabel()
	{
	   return $this->syarat_sttb == 1 ? 'Ya' : 'Tidak';
	}
		public function getSkhusLabel()
	{
	   return $this->syarat_skhus == 1 ? 'Ya' : 'Tidak';
	}
		public function getSertiLabel()
	{
	   return $this->syarat_sertifikat == 1 ? 'Ya' : 'Tidak';
	}
		public function getKkLabel()
	{
	   return $this->syarat_kk == 1 ? 'Ya' : 'Tidak';
	}
		public function getAktaLabel()
	{
	   return $this->syarat_akta == 1 ? 'Ya' : 'Tidak';
	}
	/**
	 * @return get fungsi statistik
	 */
		public function getJmlPendaftar()
    {
         return CalonSiswa::find()->where(array('kd_tapel'=> 1))->count();
    }
	
	public function getJmlPendaftarCowok()
    {
         return CalonSiswa::find()->where(array('kd_tapel'=> 1, 'kelamin' => '1'))->count();
    }
	
	public function getJmlPendaftarCewek()
    {
         return CalonSiswa::find()->where(array('kd_tapel'=> 1, 'kelamin'=> '0'))->count();
    }
	
	public function getJmlCabut()
    {
         return CalonSiswa::find()->where(array('pencabutan' => '1','kd_tapel'=> 1))->count();
    }
	

}
