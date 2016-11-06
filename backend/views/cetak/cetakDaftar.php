<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\icons\Icon;
use backend\models\CalonSiswa;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\KepalaKel */


$this->params['breadcrumbs'][] = $this->title;
Yii::$app->formatter->locale = 'id-ID';
Yii::$app->language ='id-ID';
?>
<div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <span class="label label-primary pull-right">
		 
		  </span>
        </div><!-- /.box-header -->
        <div class="box-body">
        
	<div class="row">
	   <div class="col-md-12 text-center">
		  <strong>BUKU PENDAFTARAN CALON PESERTA DIDIK BARU<br/>
								SMA NEGERI 1 WONOTUNGGAL<br/>
								TAHUN AJARAN <?= $tapel->tapel ?><br/>

		  </strong>
	   </div>
	</div>
	
     
  <?php
					 $gridColumns =[
					['class' => 'yii\grid\SerialColumn'],
					//	'id_nilai',
					//'kd_tapel',
					[
						  'attribute'=>'tgl_daftar',
						  'vAlign'=>'middle',
						  'hAlign'=>'center',
						  'format'=>['date', 'php:j F Y'],
					],
					[
						  'attribute'=>'no_daftar',
						  'vAlign'=>'middle',
						  'hAlign'=>'center'
					],					
					'nama',
					//'kd_calon_siswa',
					'sekolah_asal',
					
					[
						'class'=>'kartik\grid\BooleanColumn',
						  'attribute'=>'kelamin', 
						  'filterType'=>GridView::FILTER_SELECT2,
						              'filterWidgetOptions'=>[
								'pluginOptions'=>['allowClear'=>true],
							],
							'filterInputOptions'=>['placeholder'=>'Jenis Kelamin'],
								'filter'=>CalonSiswa::getGenders(), 
								'trueLabel' => 'Laki-Laki', 
								'falseLabel' => 'Perempuan',
								'trueIcon' => '<span class="">Laki-Laki</span>',
								'falseIcon' => '<span class="">Perempuan</span>',
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
					 
					 
					
					// 'postdate',
					// 'id_user',

				
				];
		
		// Generate a bootstrap responsive striped table with row highlighted on hover
			echo GridView::widget([
				'dataProvider'=> $dataProvider,
			//	'filterModel' => $searchModel,
				'columns' => $gridColumns,
			//	'panel' => [
			//			'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i>  Rangking Pendaftaran</h3>',
			//			'type'=>'info',
			//			'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
			//			'footer'=>false,
			//		],
			//	'responsive'=>true,

				'hover'=>true,
				'bordered'=> true,
			//	'pjax' => true,
				'striped' => false,
				'condensed' => false,

			]);
		?>
      <!-- / end client details section -->
      

<div class="container">
    <div class="row">
        <div class="col-xs-6 text-left">
            <br/>
        <br/>
          <br/>
		  <br/>
           <br/>
         <br/>
          <br/>
        </div>
        <div class="col-xs-4 col-sm-10">
					 Batang, <?= Yii::$app->formatter->asDate('now', 'php:j F Y'); ?> <br/>
					Ketua Panitia PPDB <br/>
					<br/>
				   <br/>
					<br/>
					<?= $tapel->ket_ppdb ?><br/>
				 NIP <?= $tapel->nip_ket ?> <br/>
        </div>
           </div>
 </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

  </div><!-- /.row -->



