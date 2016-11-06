<?php

namespace backend\controllers;

use Yii;
use yii\base\Model;
use backend\models\CalonSiswa;
use backend\models\CalonSiswaSearch;
use backend\models\Nilai;
use backend\models\Prestasi;
use backend\models\Domisili;
use backend\models\Tapel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CalonSiswaController implements the CRUD actions for CalonSiswa model.
 */
class CalonSiswaController extends Controller
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
     * pencabutan, update nilai pencabutan menjadi 1 CalonSiswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_calon
     * @param string $no_daftar
     * @return mixed
     */
    public function actionTarik($id_calon, $no_daftar)
    {
		$tapelId= Tapel::find()->where(['status' => '0'])->one();
		$tapel= Tapel::findOne($tapelId->kd_tapel);
        $model = $this->findModel($id_calon, $no_daftar);
		$nilai = Nilai::find()->where(['kd_calon_siswa' => $id_calon, 'no_daftar'=>$no_daftar])->one();
		
		if (!isset($model, $nilai)) {
            throw new NotFoundHttpException("Pendaftar tidak ditemukan");
        }
		
		$model->scenario ='penarikan';
		$nilai->scenario = 'penarikan';

        if (isset($model->pencabutan) && isset($nilai->pencabutan)) {
			$isValid = Model::validateMultiple([$model, $nilai]);

			 if ($isValid) {
				$model->save($model->pencabutan = 0);
				$nilai->save($nilai->pencabutan = 0);
				$model->save($model->tgl_cabut = Yii::$app->formatter->asDate('now', 'php:Y-m-d'));
				$nilai->save($nilai->tgl_cabut = Yii::$app->formatter->asDate('now', 'php:Y-m-d'));
                $model->save(false);
                $nilai->save(false);
               Yii::$app->getSession()->setFlash('success','Pembatalan Pencabutan calon siswa berhasil!');
			    return $this->redirect(['lihat', 'id_calon' => $model->id_calon, 'no_daftar' => $model->no_daftar]);
            } else {
				 Yii::$app->getSession()->setFlash('warning','Hapus Pencabutan Gagal!');
			}
           
        } else {
            
			$searchModel = new CalonSiswaSearch();
			$dataProvider = $searchModel->cabut(Yii::$app->request->queryParams);
			Yii::$app->getSession()->setFlash('warning','Hapus Pencabutan Gagal (validasi)!');
			return $this->render('cabut', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
			]);
        }
    }
    /**
     * pencabutan, update nilai pencabutan menjadi 1 CalonSiswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_calon
     * @param string $no_daftar
     * @return mixed
     */
    public function actionBuang($id_calon, $no_daftar)
    {
		$tapelId= Tapel::find()->where(['status' => '0'])->one();
		$tapel= Tapel::findOne($tapelId->kd_tapel);
        $model = $this->findModel($id_calon, $no_daftar);
		$nilai = Nilai::find()->where(['kd_calon_siswa' => $id_calon, 'no_daftar'=>$no_daftar])->one();
		
		if (!isset($model, $nilai)) {
            throw new NotFoundHttpException("Pendaftar tidak ditemukan");
        }
		
		$model->scenario ='pencabutan';
		$nilai->scenario = 'pencabutan';

        if (isset($model->pencabutan) && isset($nilai->pencabutan)) {
			$isValid = Model::validateMultiple([$model, $nilai]);

			 if ($isValid) {
				$model->save($model->pencabutan = 1);
				$nilai->save($nilai->pencabutan = 1);
				$model->save($model->tgl_cabut = Yii::$app->formatter->asDate('now', 'php:Y-m-d'));
				$nilai->save($nilai->tgl_cabut = Yii::$app->formatter->asDate('now', 'php:Y-m-d'));
                $model->save(false);
                $nilai->save(false);
               Yii::$app->getSession()->setFlash('success','Pencabutan calon siswa berhasil!');
			    return $this->redirect(['lihat', 'id_calon' => $model->id_calon, 'no_daftar' => $model->no_daftar]);
            } else {
				 Yii::$app->getSession()->setFlash('warning','Pencabutan Gagal!');
			}
           
        } else {
            
			$searchModel = new CalonSiswaSearch();
			$dataProvider = $searchModel->cabut(Yii::$app->request->queryParams);
			Yii::$app->getSession()->setFlash('warning','Pencabutan Gagal (validasi)!');
			return $this->render('cabut', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
			]);
        }
    }
	
    /**
     * Lists all CalonSiswa models.
     * @return mixed
     */
    public function actionCabut()
    {
        $searchModel = new CalonSiswaSearch();
        $dataProvider = $searchModel->cabut(Yii::$app->request->queryParams);

        return $this->render('cabut', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	    /**
     * Displays a single CalonSiswa model.
     * @param integer $id_calon
     * @param string $no_daftar
     * @return mixed
     */
	 
    public function actionLihat($id_calon, $no_daftar)
    {
		$nilai = new Nilai();
		$rangking = $nilai->getRangking($no_daftar);
        return $this->render('data', [
            'model' => $this->findModel($id_calon, $no_daftar), 'model2' => $this->findModel2($id_calon, $no_daftar), 'rangking' => $rangking,
        ]);
    }

    /**
     * Lists all CalonSiswa models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new CalonSiswaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CalonSiswa model.
     * @param integer $id_calon
     * @param string $no_daftar
     * @return mixed
     */
    public function actionView($id_calon, $no_daftar)
    {
		$nilai = new Nilai();
		$rangking = $nilai->getRangking($no_daftar);
        return $this->render('view', [
            'model' => $this->findModel($id_calon, $no_daftar), 'model2' => $this->findModel2($id_calon, $no_daftar), 'rangking' => $rangking,
        ]);
    }

    /**
     * Creates a new CalonSiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CalonSiswa();
		$nilai = new Nilai();

		$tapelId= Tapel::find()->where(['status' => '0'])->one();
		$tapel= Tapel::findOne($tapelId->kd_tapel);
		//tanpa validate multiple karena ada FK di nilai thd calon siswa yaitu kd_calon dan no daftar
		//&& Model::validateMultiple([$model, $nilai])		

		if ($model->load(Yii::$app->request->post()) && $nilai->load(Yii::$app->request->post())&& Model::validateMultiple([$model, $nilai])) {
			 $transaction = Yii::$app->db->beginTransaction();
			  try{
						//get next id value
						$q = 'SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = "ppdb" AND TABLE_NAME = "calon_siswa"';
						$nextId = str_pad(Yii::$app->db->createCommand($q)->queryScalar(), 4, '0', STR_PAD_LEFT);  

						$nilai->save($nilai->kd_calon_siswa = $nextId);
						//seting no pendaftaran
						$noDaftar = $tapel->tahun.$model->kelamin.$nextId;
						$nilai->save($nilai->no_daftar = $noDaftar);
						$model->save($model->no_daftar = $noDaftar);
						$model->save(false);
						//seting skor prestasi
						if (isset($nilai->prestasi) && !empty($nilai->prestasi)){
							$nilai->save($nilai->id_prestasi = $nilai->prestasi);
							$prestasi= Prestasi::findOne($nilai->prestasi);
							$skor = $prestasi->skor;
							$nilai->save($nilai->prestasi = $skor);
							
						} else {
							$skor = 0;
							$nilai->save($nilai->prestasi = 0);
							$nilai->save($nilai->id_prestasi = 0);
						}
						
						//nilai domisili
						if (isset($nilai->domisili) && !empty($nilai->domisili)){
							$nilai->save($nilai->id_domisili = $nilai->domisili);
							$dom = Domisili::findOne($nilai->domisili);
							$poin = $dom->poin;
							$nilai->save($nilai->domisili = $poin);
							
						} else {
							$poin = 0;
							$nilai->save($nilai->domisili = 0);
							$nilai->save($nilai->id_domisili = 0);
						}
						
						//nilai total
						$totalNilai = $skor + $poin + $nilai->b_ina + $nilai->b_ing + $nilai->mat + $nilai->ipa;
						$nilai->save($nilai->total = $totalNilai);
						//nilai postdate
						$nilai->save($nilai->postdate = $model->tgl_daftar);
						//seting sattus pencabutan
						$nilai->save($nilai->pencabutan = $model->pencabutan);
						$nilai->save(false);
						
						
						if ($model->hasErrors() && $nilai->hasErrors()) {
						 Yii::$app->getSession()->setFlash('warning','Validasi gagal!');
						return $this->render('create', [
						'model' => $model, 'nilai' => $nilai, 'tapel' => $tapel, 
						]);
						} else {
						// validation succeeds
						 $transaction->commit();
						 Yii::$app->getSession()->setFlash('success','Berhasil menyimpan data!');
						return $this->redirect(['view', 'id_calon' => $model->id_calon, 'no_daftar' => $model->no_daftar]);
						}		
				}catch(Exception $e){
					$transaction->rollback();
					throw $e;
				}				
		}	else {
			return $this->render('create', [
            'model' => $model, 'nilai' => $nilai, 'tapel' => $tapel, 
			]);
		}

    }

    /**
     * Updates an existing CalonSiswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_calon
     * @param string $no_daftar
     * @return mixed
     */
    public function actionUpdate($id_calon, $no_daftar)
    {
		$tapelId= Tapel::find()->where(['status' => '0'])->one();
		$tapel= Tapel::findOne($tapelId->kd_tapel);
        $model = $this->findModel($id_calon, $no_daftar);
		$nilai = Nilai::find()->where(['kd_calon_siswa' => $id_calon, 'no_daftar'=>$no_daftar])->one();
		
		
		if (!isset($model, $nilai)) {
            throw new NotFoundHttpException("Pendaftar tidak ditemukan");
        }
		
		$model->scenario ='update';
		$nilai->scenario = 'update';
		
			
        if ($model->load(Yii::$app->request->post()) && $nilai->load(Yii::$app->request->post())) {
			$isValid = Model::validateMultiple([$model, $nilai]);
			 $transaction = Yii::$app->db->beginTransaction();
			  try{
			 if ($isValid) {
				 
						//seting skor prestasi
						if (isset($nilai->prestasi) && !empty($nilai->prestasi)){
							$nilai->save($nilai->id_prestasi = $nilai->prestasi);
							$prestasi= Prestasi::findOne($nilai->prestasi);
							$skor = $prestasi->skor;
							$nilai->save($nilai->prestasi = $skor);
							
						} else {
							$skor = 0;
							$nilai->save($nilai->prestasi = 0);
							$nilai->save($nilai->id_prestasi = 0);
						}
						
						//nilai domisili
						if (isset($nilai->domisili) && !empty($nilai->domisili)){
							$nilai->save($nilai->id_domisili = $nilai->domisili);
							$dom = Domisili::findOne($nilai->domisili);
							$poin = $dom->poin;
							$nilai->save($nilai->domisili = $poin);
							
						} else {
							$poin = 0;
							$nilai->save($nilai->domisili = 0);
							$nilai->save($nilai->id_domisili = 0);
						}
						
						//nilai total
						$totalNilai = $skor + $poin + $nilai->b_ina + $nilai->b_ing + $nilai->mat + $nilai->ipa;
						$nilai->save($nilai->total = $totalNilai);
						//nilai postdate
						//$nilai->save($nilai->postdate = $model->tgl_daftar);
						//$nilai->save(false);
				 
                $model->save(false);
                $nilai->save(false);
				$transaction->commit();
				Yii::$app->getSession()->setFlash('success','Berhasil update data!');
			    return $this->redirect(['view', 'id_calon' => $model->id_calon, 'no_daftar' => $model->no_daftar]);
				
				
            } else {
				 Yii::$app->getSession()->setFlash('warning','Validasi Gagal!');
			}
           }catch(Exception $e){
					$transaction->rollback();
					throw $e;
			}	
        } else {
            return $this->render('update', [
                'model' => $model, 'nilai' => $nilai, 'tapel' => $tapel,
            ]);
        }
    }

    /**
     * Deletes an existing CalonSiswa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_calon
     * @param string $no_daftar
     * @return mixed
     */
    public function actionDelete($id_calon, $no_daftar)
    {
		$this->findModel2($id_calon, $no_daftar)->delete();
        $this->findModel($id_calon, $no_daftar)->delete();
		Yii::$app->getSession()->setFlash('success','Berhasil delete data!');
        return $this->redirect(['index']);
    }

    /**
     * Finds the CalonSiswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_calon
     * @param string $no_daftar
     * @return CalonSiswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_calon, $no_daftar)
    {
        if (($model = CalonSiswa::findOne(['id_calon' => $id_calon, 'no_daftar' => $no_daftar])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	    protected function findModel2($id_calon, $no_daftar)
    {
        if (($model2 = Nilai::findOne(['kd_calon_siswa' => $id_calon, 'no_daftar' => $no_daftar])) !== null) {
            return $model2;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	    /**
     * Lists all CalonSiswa models.
     * @return mixed
     */
    public function actionDaftarulang()
    {
        $searchModel = new CalonSiswaSearch();
        $dataProvider = $searchModel->cabut(Yii::$app->request->queryParams);

        return $this->render('daftaru', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	    /**
     * Displays a single CalonSiswa model.
     * @param integer $id_calon
     * @param string $no_daftar
     * @return mixed
     */
	 
}
