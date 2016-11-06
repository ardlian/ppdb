<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use kartik\icons\Icon;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\NilaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cetak Surat Pemberitahuan Diterima';
$this->params['breadcrumbs'][] = $this->title;

?>
 <div class="box-header with-border">
          <span class="pull-right">
		  <?php
		  echo Html::a(Icon::show('print', ['class' => 'fa-1x'], Icon::BSG).'Cetak Pilih Surat',['cetakpilihsemua?kd_tapel='.$tapel->kd_tapel], [
					'type'=>'submit', 
					'class'=>'btn btn-primary',
					'data-toggle'=>'tooltip',
					'title'=>'Cetak surat Pemberitahuan',
					'target'=>'_blank'
					]);
		  ?>
		  </span>
        </div><!-- /.box-header -->
<div class="nilai-index">
  
 <?php $gridColumns =[
					['class' => 'yii\grid\SerialColumn'],
					//	'id_nilai',
					//'kd_tapel',
					'nama',
					//'kd_calon_siswa',
					[
						  'attribute'=>'no_daftar',
						  'vAlign'=>'middle',
						  'hAlign'=>'center',

					],
					
					//'status',
					// 'b_ina',
				//	 'b_ing',
					// 'mat',
					// 'ipa',
					 [
						  'attribute'=>'totalUn',
						  'vAlign'=>'middle',
						  'hAlign'=>'center'
					],
					 [
						  'attribute'=>'prestasi',
						  'vAlign'=>'middle',
						  'hAlign'=>'center'
					],
					[
						  'attribute'=>'domisili',
						  'vAlign'=>'middle',
						  'hAlign'=>'center'
					],
					[
						  'attribute'=> 'total',
						  'vAlign'=>'middle',
						  'hAlign'=>'center'
					],
					 
					['class' => 'kartik\grid\ActionColumn',
					'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>'],
					'template' => '{lihat} ',
					'buttons' => [
						
						'lihat' => function ($url, $model) {
								return Html::a(Icon::show('print', ['class' => 'fa-1x'], Icon::BSG), $url, 
								[
									'title' => Yii::t('app', 'Cetak Surat'),
									'data' => [
										'confirm' => 'Apakah Anada yakin mencetak dokumen ini?',
										'method' => 'post',
									],
									'type'=>'submit', 
									//'class'=>'btn btn-primary pull-right',
									'data-toggle'=>'tooltip',
									'target'=>'_blank'
								]);
						}
					],
						'urlCreator' => function ($action, $model, $key, $index) {
						if ($action === 'lihat') {
							return Url::to(['cetak/cetakterima?kd_calon_siswa='.ArrayHelper::getValue($model, 'kd_calon_siswa').'&no_daftar='.ArrayHelper::getValue($model, 'no_daftar')]);
						}
					}

					], 
				];
		
		// Generate a bootstrap responsive striped table with row highlighted on hover
			echo GridView::widget([
				'dataProvider'=> $dataProvider,
			//	'filterModel' => $searchModel,
				'columns' => $gridColumns,
				'panel' => [
						'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> - Rangking Pendaftaran</h3>',
						'type'=>'info',
						//'before'=>Html::a('<i class="fa fa-print"></i> Cetak Semua Surat', ['cetakterimasemua?kd_tapel='.$tapel->kd_tapel], ['class' => 'btn btn-info', 'target' => '_blank']),
						'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
						'footer'=>false
					],
				'responsive'=>true,
				'hover'=>true,
				'bordered'=> true,
				'pjax' => true,
				'striped' => false,
				'condensed' => false,

			]);
		?>
  
</div>
