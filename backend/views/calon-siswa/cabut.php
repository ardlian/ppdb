<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CalonSiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu Pencabutan';
$this->params['breadcrumbs'][] = $this->title;
use backend\models\CalonSiswa;
?>

<div class="row">
    <div class="col-sm-12">
	<?php
					 $gridColumns =[
					['class' => 'kartik\grid\SerialColumn'],
						//'kd_tapel',
						//'id_calon',
						'no_daftar',
						'nama',
						//'tmpat_lahir',
						// 'tgl_lahir',
						// 'agama',
						[
						'class'=>'kartik\grid\BooleanColumn',
						  'attribute'=>'kelamin', 
						  'vAlign'=>'middle',
						  'filterType'=>GridView::FILTER_SELECT2,
						              'filterWidgetOptions'=>[
								'pluginOptions'=>['allowClear'=>true],
							],
							'filterInputOptions'=>['placeholder'=>'Jenis Kelamin'],
								'filter'=>CalonSiswa::getGenders(), 
								'trueLabel' => 'Laki-Laki', 
								'falseLabel' => 'Perempuan',
								'trueIcon' => '<span class="fa fa-mars"></span>',
								'falseIcon' => '<span class="fa fa-venus"></span>',
						],
						// 'anak_ke',
						// 'hp',
						// 'alamat',
						// 'nama_ayah',
						// 'kerja_ayah',
						// 'pen_ayah',
						// 'nama_ibu',
						// 'kerja_ibu',
						// 'pend_ibu',
						// 'alamat_ortu',
						// 'nama_wali',
						// 'kerja_wali',
						// 'pend_wali',
						// 'alamat_wali',
						 'sekolah_asal',
						// 'alamat_sekolah',
						// 'no_sttb',
						// 'nisn',
						// 'hp_ortu',
						// 'hp_wali',
						// 'thn_lulus',
						// 'tgl_daftar',
						// 'status_daftar',
						// 'status_diterima',
						 [
								'class'=>'kartik\grid\BooleanColumn',
								'attribute'=>'pencabutan', 
								 'vAlign'=>'middle',
								  'filterType'=>GridView::FILTER_SELECT2,
											  'filterWidgetOptions'=>[
										'pluginOptions'=>['allowClear'=>true],
									],
									'filterInputOptions'=>['placeholder'=>'Status Daftar'],
								'filter'=>CalonSiswa::getCabuts(), 
								'trueLabel' => 'Dicabut', 
								'falseLabel' => 'Daftar',
								'trueIcon' => '<span class="glyphicon glyphicon-remove text-danger"></span>',
								'falseIcon' => '<span class="glyphicon glyphicon-ok text-success"></span>',
							],
						// 'validasi',
						// 'tb',
						// 'bb',
						// 'id_pendaftar',
						// 'id_validator',
						// 'status_sekolah',
						// 'syarat_foto',
						// 'syarat_sttb',
						// 'syarat_skhus',
						// 'syarat_sertifikat',
						// 'syarat_kk',
						// 'syarat_akta',

					['class' => 'kartik\grid\ActionColumn',
					'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>'],
					'template' => '{lihat} {cabut_action} {tarik_action}',
					'buttons' => [
						'cabut_action' => function ($url, $model) {
								return $model->pencabutan == 0 ? Html::a('<span class="fa fa-times"></span>', $url, 
								[
									'title' => Yii::t('app', 'Cabut Pendaftaran'),
									'data' => [
										'confirm' => 'Apakah Anada yakin mencabut siswa ini?',
										'method' => 'post',
									],
								]): '';
						},
						
						'tarik_action' => function ($url, $model) {
								return $model->pencabutan == 1 ? Html::a('<span class="fa fa-check"></span>', $url, 
								[
									'title' => Yii::t('app', 'Batal Cabut Pendaftaran'),
									'data' => [
										'confirm' => 'Apakah Anada yakin membatalkan status cabut siswa ini?',
										'method' => 'post',
									],
								]): '';
						},

						'lihat' => function ($url, $model) {
								return Html::a('<span class="fa fa-eye"></span>', $url, 
								[
									'title' => Yii::t('app', 'Lihat Data'),
								]);
						}
					],
						'urlCreator' => function ($action, $model, $key, $index) {
						if ($action === 'cabut_action') {
							return Url::to(['calon-siswa/buang?id_calon='.$model->id_calon.'&no_daftar='.$model->no_daftar]);
						} else if($action === 'lihat'){
							return Url::to(['calon-siswa/lihat?id_calon='.$model->id_calon.'&no_daftar='.$model->no_daftar]);
						} else if($action === 'tarik_action'){
							return Url::to(['calon-siswa/tarik?id_calon='.$model->id_calon.'&no_daftar='.$model->no_daftar]);
						}
					}
					// 'template' => '{view}',
					],
				];
		
		// Generate a bootstrap responsive striped table with row highlighted on hover
			echo GridView::widget([
				'dataProvider'=> $dataProvider,
				'filterModel' => $searchModel,
				'columns' => $gridColumns,
				'autoXlFormat' => true, 
				'showPageSummary' => false,
				'export' => [
					'fontAwesome' => true
				],  
				'panel' => [
						'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i>  List Data Calon Siswa</h3>',
						'type'=>'primary',
						//'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Country', ['create'], ['class' => 'btn btn-success']),
					//	'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Input Pendaftaran', ['create'], ['class' => 'btn btn-info']),
					//	'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
						'footer'=>true
					],
				'pjax' => true,
				'bordered' => true,
				'striped' => false,
				'condensed' => false,
				'responsive' => true,
				'hover' => true,
				'floatHeader' => false,
			]);
		?>
     
    </div><!-- /.col -->
  </div><!-- /.row -->


