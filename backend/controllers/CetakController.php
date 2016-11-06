<?php

namespace backend\controllers;

use Yii;
use backend\models\Nilai;
use backend\models\NilaiSearch;
use backend\models\CalonSiswa;
use backend\models\CalonSiswaSearch;
use backend\models\Tapel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\DynamicModel;
use kartik\mpdf\Pdf;

/**
 * NilaiController implements the CRUD actions for Nilai model.
 */
class CetakController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Nilai models.
     * @return mixed
     */
    public function actionIndex()
    {
		$calon = new CalonSiswa();
        $searchModel = new NilaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'calon' => $calon,			
        ]);
    }

    /**
     * Displays a single Nilai model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($postdate, $kd_tapel)
    {
		$nilai = new Nilai();
		$tapel= Tapel::findOne($kd_tapel);
		 $calon = new CalonSiswa();
		$searchModel = new NilaiSearch();
		$dataProvider = $searchModel->cetak($postdate, $kd_tapel);
        return $this->render('templateJurnal', [
			'postdate'=>$postdate,
			'kd_tapel'=>$kd_tapel,
			'nilai' => $nilai, 
			'tapel' => $tapel,
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Nilai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 $model = new DynamicModel(['kd_tapel', 'postdate']);
		$model->addRule(['kd_tapel', 'postdate'], 'required')
        ->addRule(['postdate'], 'safe')
        ->addRule(['kd_tapel'], 'integer');
		$tapelId= Tapel::find()->where(['status' => '0'])->one();
		$tapel= Tapel::findOne($tapelId->kd_tapel);
   
        if ($model->load(Yii::$app->request->post())) {
			if ($model->hasErrors()) {
				// validation fails
				//Yii::$app->session->setFlash('error', 'Validasi Gagal, pastikan tanggal diisi');
				 
			} else {
					// validation succeeds
				return $this->redirect(['view', 'postdate' => $model->postdate, 'kd_tapel' => $model->kd_tapel]);	 
			}
            
        } else {
            return $this->render('create', [
                'model' => $model, 'tapel' => $tapel,
            ]);
        }
    }
 /**
     * cetak buku nomor pendaftaran.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionNomor()
    {
		 $model = new DynamicModel(['kd_tapel', 'postdate']);
		$model->addRule(['kd_tapel', 'postdate'], 'required')
        ->addRule(['postdate'], 'safe')
        ->addRule(['kd_tapel'], 'integer');
		$tapelId= Tapel::find()->where(['status' => '0'])->one();
		$tapel= Tapel::findOne($tapelId->kd_tapel);
   
        if ($model->load(Yii::$app->request->post())) {
			if ($model->hasErrors()) {
				// validation fails
				//Yii::$app->session->setFlash('error', 'Validasi Gagal, pastikan tanggal diisi');
				 
			} else {
					// validation succeeds
				return $this->redirect(['templatenomor', 'postdate' => $model->postdate, 'kd_tapel' => $model->kd_tapel]);	 
			}
            
        } else {
            return $this->render('nomor', [
                'model' => $model, 'tapel' => $tapel,
            ]);
        }
    }
	
	 public function actionTemplatenomor($postdate, $kd_tapel)
    {
		$nilai = new Nilai();
		$tapel= Tapel::findOne($kd_tapel);
		 //$calon = new CalonSiswa();
		$searchModel = new CalonSiswaSearch();
		$dataProvider = $searchModel->nomor($postdate, $kd_tapel);
        return $this->render('templateNomor', [
			'postdate'=>$postdate,
			'kd_tapel'=>$kd_tapel,
			'nilai' => $nilai, 
			'tapel' => $tapel,
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Updates an existing Nilai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_nilai]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Nilai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Nilai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nilai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nilai::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionCetakjurnal($postdate, $kd_tapel)
    {
				$nilai = new Nilai();
				$tapel= Tapel::findOne($kd_tapel);
				 $calon = new CalonSiswa();
				$searchModel = new NilaiSearch();
				$dataProvider = $searchModel->cetak($postdate, $kd_tapel);
				$pdf = new Pdf([
					'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
					'orientation' => Pdf::ORIENT_PORTRAIT,
					'format'=>Pdf::FORMAT_FOLIO,
					'content' => $this->renderPartial('cetakJurnal', [
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
					'postdate'=>$postdate,
					'kd_tapel'=>$kd_tapel,
					'nilai' => $nilai, 
					'tapel' => $tapel,
					'calon' => $calon,
					  //  'dataProvider' => $dataProvider,
					]),
					'options' => [
						'title' => 'JURNAL PENERIMAAN PESERTA DIDIK BARU',
						'subject' => 'Cetak Jurnal PPDB'
					],
					'methods' => [
					//	'SetHeader' => ['PPDB - '.Yii::$app->user->identity->username.'  ||dicetak pada: ' . date("r")],
						'SetFooter' => ['PPDB - '.Yii::$app->user->identity->username.'|Page {PAGENO}|'],
					]
				]);
				return $pdf->render();
	
    }
	
	public function actionCetaknomor($postdate, $kd_tapel)
    {
				$nilai = new Nilai();
				$tapel= Tapel::findOne($kd_tapel);
				$searchModel = new CalonSiswaSearch();
				$dataProvider = $searchModel->nomor($postdate, $kd_tapel);
				$pdf = new Pdf([
					'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
					'orientation' => Pdf::ORIENT_PORTRAIT, 
					'format'=>Pdf::FORMAT_FOLIO,
					'content' => $this->renderPartial('cetakNomor', [
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
					'postdate'=>$postdate,
					'kd_tapel'=>$kd_tapel,
					'nilai' => $nilai, 
					'tapel' => $tapel,
					]),
					'options' => [
						'title' => 'Buku Nomor Pendaftaran',
						'subject' => 'Cetak Buku Nomor Pendaftaran'
					],
					'methods' => [
					//	'SetHeader' => ['PPDB - '.Yii::$app->user->identity->username.'  ||dicetak pada: ' . date("r")],
						'SetFooter' => ['PPDB - '.Yii::$app->user->identity->username.'|Page {PAGENO}|'],
					]
				]);
				return $pdf->render();
	
    }
	
	
    /**
     * Creates a new Nilai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCabut()
    {
		 $model = new DynamicModel(['kd_tapel', 'postdate']);
		$model->addRule(['kd_tapel', 'postdate'], 'required')
        ->addRule(['postdate'], 'safe')
        ->addRule(['kd_tapel'], 'integer');
		$tapelId= Tapel::find()->where(['status' => '0'])->one();
		$tapel= Tapel::findOne($tapelId->kd_tapel);
   
        if ($model->load(Yii::$app->request->post())) {
			if ($model->hasErrors()) {
				// validation fails
				//Yii::$app->session->setFlash('error', 'Validasi Gagal, pastikan tanggal diisi');
				 
			} else {
					// validation succeeds
				return $this->redirect(['templatecabut', 'postdate' => $model->postdate, 'kd_tapel' => $model->kd_tapel]);	 
			}
            
        } else {
            return $this->render('cabut', [
                'model' => $model, 'tapel' => $tapel,
            ]);
        }
    }
	
		 public function actionTemplatecabut($postdate, $kd_tapel)
    {
		$nilai = new Nilai();
		$tapel= Tapel::findOne($kd_tapel);
		 //$calon = new CalonSiswa();
		$searchModel = new CalonSiswaSearch();
		$dataProvider = $searchModel->cetakcabut($postdate, $kd_tapel);
        return $this->render('templateCabut', [
			'postdate'=>$postdate,
			'kd_tapel'=>$kd_tapel,
			'nilai' => $nilai, 
			'tapel' => $tapel,
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
		public function actionCetakcabut($postdate, $kd_tapel)
    {
				$nilai = new Nilai();
				$tapel= Tapel::findOne($kd_tapel);
				$searchModel = new CalonSiswaSearch();
				$dataProvider = $searchModel->cetakcabut($postdate, $kd_tapel);
				$pdf = new Pdf([
					'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
					'orientation' => Pdf::ORIENT_LANDSCAPE, 
					'format'=>Pdf::FORMAT_FOLIO,
					'content' => $this->renderPartial('cetakCabut', [
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
					'postdate'=>$postdate,
					'kd_tapel'=>$kd_tapel,
					'nilai' => $nilai, 
					'tapel' => $tapel,
					]),
					'options' => [
						'title' => 'Buku Pencabutan',
						'subject' => 'Cetak Buku Pencabutan'
					],
					'methods' => [
					//	'SetHeader' => ['PPDB - '.Yii::$app->user->identity->username.'  ||dicetak pada: ' . date("r")],
					//	'SetFooter' => ['PPDB - '.Yii::$app->user->identity->username.'|Page {PAGENO}|'],
					]
				]);
				return $pdf->render();
	
    }
	
	
    /**
     * Creates a new Nilai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionDaftar()
    {
		 $model = new DynamicModel(['kd_tapel', 'postdate']);
		$model->addRule(['kd_tapel', 'postdate'], 'required')
        ->addRule(['postdate'], 'safe')
        ->addRule(['kd_tapel'], 'integer');
		$tapelId= Tapel::find()->where(['status' => '0'])->one();
		$tapel= Tapel::findOne($tapelId->kd_tapel);
   
        if ($model->load(Yii::$app->request->post())) {
			if ($model->hasErrors()) {
				// validation fails
				//Yii::$app->session->setFlash('error', 'Validasi Gagal, pastikan tanggal diisi');
				 
			} else {
					// validation succeeds
				return $this->redirect(['templatedaftar', 'postdate' => $model->postdate, 'kd_tapel' => $model->kd_tapel]);	 
			}
            
        } else {
            return $this->render('daftar', [
                'model' => $model, 'tapel' => $tapel,
            ]);
        }
    }
	
	public function actionTemplatedaftar($postdate, $kd_tapel)
    {
		$nilai = new Nilai();
		$tapel= Tapel::findOne($kd_tapel);
		 $calon = new CalonSiswa();
		$searchModel = new NilaiSearch();
		$dataProvider = $searchModel->cetak($postdate, $kd_tapel);
        return $this->render('templateDaftar', [
			'postdate'=>$postdate,
			'kd_tapel'=>$kd_tapel,
			'nilai' => $nilai, 
			'tapel' => $tapel,
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
		
    }
	
	
	public function actionCetakdaftar($postdate, $kd_tapel)
    {
				$nilai = new Nilai();
				$tapel= Tapel::findOne($kd_tapel);
				 $calon = new CalonSiswa();
				$searchModel = new NilaiSearch();
				$dataProvider = $searchModel->cetak($postdate, $kd_tapel);
				$pdf = new Pdf([
					'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
					'orientation' => Pdf::ORIENT_LANDSCAPE, 
					'format'=>Pdf::FORMAT_FOLIO,
					'content' => $this->renderPartial('cetakDaftar', [
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
					'postdate'=>$postdate,
					'kd_tapel'=>$kd_tapel,
					'nilai' => $nilai, 
					'tapel' => $tapel,
					'calon' => $calon,
					  //  'dataProvider' => $dataProvider,
					]),
					'options' => [
						'title' => 'BUKU PENDAFTARAN CALON PESERTA DIDIK BARU',
						'subject' => 'Cetak Buku Pendaftaran'
					],
					'methods' => [
					//	'SetHeader' => ['PPDB - '.Yii::$app->user->identity->username.'  ||dicetak pada: ' . date("r")],
						'SetFooter' => ['PPDB - '.Yii::$app->user->identity->username.'|Page {PAGENO}|'],
					]
				]);
				return $pdf->render();
	
    }
	
	
    /**
     * Creates a new Nilai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionTerima()
    {
		 $calon = new CalonSiswa();
        $searchModel = new NilaiSearch();
		$tapel= Tapel::find()->where(['status' => '0'])->one();
        $dataProvider = $searchModel->terima(Yii::$app->request->queryParams);

        return $this->render('terima', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'calon' => $calon,	
			'tapel' => $tapel,
        ]);
    }
	
	public function actionTemplateterima($kd_calon_siswa, $no_daftar)
    {
		$nilai = new Nilai();
		$tapel= Tapel::findOne($kd_tapel);
		 $calon = new CalonSiswa();
		$searchModel = new NilaiSearch();
		$dataProvider = $searchModel->cetak($postdate, $kd_tapel);
        return $this->render('templateDaftar', [
			'postdate'=>$postdate,
			'kd_tapel'=>$kd_tapel,
			'nilai' => $nilai, 
			'tapel' => $tapel,
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
		
    }
	
	
	public function actionCetakterima($kd_calon_siswa, $no_daftar)
    {
				$tapel= Tapel::find()->where(['status' => '0'])->one();
				$calon = CalonSiswa::find()->where(['id_calon' => $kd_calon_siswa, 'no_daftar'=> $no_daftar, 'kd_tapel' => $tapel->kd_tapel, 'pencabutan' => '0'])->one();

				$pdf = new Pdf([
					'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
					'format'=>Pdf::FORMAT_FOLIO,					
					'orientation' => Pdf::ORIENT_PORTRAIT, 
					'content' => $this->renderPartial('cetakTerima', [
						'tapel' => $tapel,
						'calon' => $calon,
					]),
					'options' => [
						'title' => 'Surat Pemberitahuan Diterima',
						'subject' => 'Cetak Surat'
					],
					'methods' => [
					//	'SetHeader' => ['PPDB - '.Yii::$app->user->identity->username.'  ||dicetak pada: ' . date("r")],
					//	'SetFooter' => ['PPDB - '.Yii::$app->user->identity->username.'|Page {PAGENO}|'],
					]
				]);
				return $pdf->render();
	
    }
	
	public function actionCetakterimasemua($kd_tapel, $awal, $akhir)
    {
				$tapel= Tapel::find()->where(['status' => '0', 'kd_tapel' => $kd_tapel])->one();
				$calon = CalonSiswa::find()->where(['between', 'id_calon', $awal, $akhir])->andWhere(['kd_tapel' => $kd_tapel, 'pencabutan' => '0'])->all();

				$pdf = new Pdf([
					'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
					'format'=>Pdf::FORMAT_FOLIO,					
					'orientation' => Pdf::ORIENT_PORTRAIT, 
					'content' => $this->renderPartial('cetakTerimaSemua', [
						'tapel' => $tapel,
						'calon' => $calon,
					]),
					'options' => [
						'title' => 'Surat Pemberitahuan Diterima',
						'subject' => 'Cetak Surat'
					],
					'methods' => [
					//	'SetHeader' => ['PPDB - '.Yii::$app->user->identity->username.'  ||dicetak pada: ' . date("r")],
					//	'SetFooter' => ['PPDB - '.Yii::$app->user->identity->username.'|Page {PAGENO}|'],
					]
				]);
				return $pdf->render();
	
    }
	
	 public function actionCetakpilihsemua()
    {
		 $model = new DynamicModel(['kd_tapel', 'awal', 'akhir']);
		$model->addRule(['kd_tapel', 'awal', 'akhir'], 'required')
		->addRule(['awal'], 'safe')
		->addRule(['akhir'], 'safe')
        ->addRule(['kd_tapel'], 'integer');
		$tapelId= Tapel::find()->where(['status' => '0'])->one();
		$tapel= Tapel::findOne($tapelId->kd_tapel);
   
        if ($model->load(Yii::$app->request->post())) {
			if ($model->hasErrors()) {
				// validation fails
				//Yii::$app->session->setFlash('error', 'Validasi Gagal, pastikan tanggal diisi');
				 
			} else {
					// validation succeeds
				return $this->redirect(['cetakterimasemua', 'awal' => $model->awal, 'akhir' => $model->akhir,'kd_tapel' => $model->kd_tapel]);	 
			}
            
        } else {
            return $this->render('terima2', [
                'model' => $model, 'tapel' => $tapel,
            ]);
        }
    }
}
