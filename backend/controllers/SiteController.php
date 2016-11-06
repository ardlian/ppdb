<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\CalonSiswa;
use backend\models\Nilai;
use yii\helpers\ArrayHelper;
use backend\models\Pendidikan;
use backend\models\Pekerjaan;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
		$cs = new CalonSiswa();
		$nilai = new Nilai();
		
		//buil data for pie chart
		$laki= (int)$cs->jmlPendaftarCowok;
		$cewe= (int)$cs->jmlPendaftarCewek;
		$kelamin= [
		  ['Laki-Laki', $laki],
		  ['Perempuan', $cewe],
		];
		
		//buil data for column chart Asal Sekolah
			 foreach($cs->find()->groupBy('sekolah_asal')->all() as $sekolah){
				$jmlsiswa = $cs->find()->where(array('kd_tapel' => 1, 'sekolah_asal' => $sekolah->sekolah_asal))->count();
				$datasiswa[]=array((int)$jmlsiswa);
				$labelsekolah[]=array($sekolah->sekolah_asal);
			}
		
		//action Pendidikan
        foreach (Pendidikan::find()->all() as $pend){
            $pendIbu = CalonSiswa::find()->where(['pend_ibu'=> $pend->id_pend] )->count();
            $pendAyah = CalonSiswa::find()->where(['pen_ayah'=> $pend->id_pend])->count();
			$pendWali = CalonSiswa::find()->where(['pend_wali'=> $pend->id_pend])->count();

            $totalPend= $pendIbu + $pendAyah + $pendWali;
            $rowpend[]=array($pend->ket, $totalPend);

            $pentot[]=array((int)$totalPend);
            $pendibu[]=array((int)$pendIbu);
            $penayah[]=array((int)$pendAyah);
			$pendwali[]=array((int)$pendWali);
            $penlabel[]=array($pend->ket);
        }
		
		//action Pekerjaan Ortu Wali
		foreach(Pekerjaan::find()->all() as $kerja){
            $kerjaAyah = CalonSiswa::find()->where(['kerja_ayah'=> $kerja->id_kerja])->count();
            $kerjaIbu = CalonSiswa::find()->where(['kerja_ibu'=> $kerja->id_kerja] )->count();
			$kerjaWali = CalonSiswa::find()->where(['kerja_wali'=> $kerja->id_kerja] )->count();
			
            $total= $kerjaAyah + $kerjaIbu + $kerjaWali;
            $rowdata[]=array($kerja->ket, $total);

            $data[]=array((int)$total);
			$data1[]=array((int)$kerjaAyah);
            $data2[]=array((int)$kerjaIbu);
            $data3[]=array((int)$kerjaWali);
            $label[]=array($kerja->ket);
        }
		
		if ($cewe == 0 and $laki == 0){
			 return $this->render('index1', [
				'cs' => $cs,
				'nilai' => $nilai,
				'data' => $data,
				]);	
		}
		 return $this->render('index', [
				'cs' => $cs,
				'nilai' => $nilai,
				'kelamin' => $kelamin,
				'datasiswa' => $datasiswa,
				'labelsekolah' => $labelsekolah,
				'rowpend' => $rowpend,
				'penlabel' => $penlabel,
				'pentot' => $pentot,
				'pendibu' => $pendibu,
				'pendwali' => $pendwali,
				'penayah' => $penayah,
				'rowdata'=> $rowdata,
				'label' =>$label,
			   'data' => $data,
			   'data1' => $data1,
				'data2' => $data2,
				'data3' => $data3,
				]);
		
       
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
