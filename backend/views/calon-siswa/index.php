<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CalonSiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu Pendaftaran';
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
						//'no_daftar',
						'nama',
						//'tmpat_lahir',
						 'tgl_lahir',
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
								'trueIcon' => '<span class=""> Laki-Laki </span>',
								'falseIcon' => '<span class=""> Perempuan </span>',
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
						// 'sekolah_asal',
						// 'alamat_sekolah',
						// 'no_sttb',
						 'nisn',
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
						 'tb',
						 'bb',
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
					// 'template' => '{view}',
					],
				];
		
		// Generate a bootstrap responsive striped table with row highlighted on hover
			echo GridView::widget([
				'dataProvider'=> $dataProvider,
				'filterModel' => $searchModel,
				'columns' => $gridColumns,
				'showPageSummary' => false,
				'export' => [
					'fontAwesome' => true
				],  
				'panel' => [
						'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i>  List Data Input</h3>',
						'type'=>'primary',
						//'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Country', ['create'], ['class' => 'btn btn-success']),
						'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Input Pendaftaran', ['create'], ['class' => 'btn btn-info']),
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


