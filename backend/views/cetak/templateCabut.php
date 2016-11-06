<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\icons\Icon;

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
          <span class="pull-right">
		  <?php
		  echo Html::a(Icon::show('print', ['class' => 'fa-1x'], Icon::BSG).'Cetak Buku Pencabutan',['/cetak/cetakcabut?postdate='.$postdate.'&kd_tapel='.$kd_tapel], [
					'type'=>'submit', 
					'class'=>'btn btn-primary pull-right',
					'data-toggle'=>'tooltip',
					'title'=>'Cetak Buku Pencabutan',
					'target'=>'_blank'
					]);
		  ?>
		  </span>
        </div><!-- /.box-header -->
        <div class="box-body">
        
	<div class="row">
	   <div class="col-md-12 text-center">
		  <h1 ><small>Buku Pencabutan<br/>
								SMA Negeri 1 Wonotunggal<br/>
								Tahun Pelajaran <?= $tapel->tapel ?><br/>
								
		  </small></h1>
	   </div>
	</div>
	
     
  <?php
					 $gridColumns =[
					['class' => 'yii\grid\SerialColumn'],
					//	'id_nilai',
					//'kd_tapel',
					[
						  'attribute'=>'tgl_cabut',
						  'vAlign'=>'middle',
						  'hAlign'=>'center',
						  'format'=>['date', 'php:j F Y'],
					],
					'nama',
					//'kd_calon_siswa',
					[
						  'attribute'=>'no_daftar',
						  'vAlign'=>'middle',
						  'hAlign'=>'center'
					],
					[
						  'attribute'=>'genderLabel',
						  'label'=>'Kelamin',
					],
										'sekolah_asal',
					[
						  'attribute'=>'fotoLabel',
						  'label'=>'Foto',
					],
					[
						  'attribute'=>'sttbLabel',
						  'label'=>'STTB',
					],
					[
						  'attribute'=>'skhusLabel',
						  'label'=>'SKHUS',
					],
					[
						  'attribute'=>'sertiLabel',
						  'label'=>'Sertifikat',
					],
					[
						  'attribute'=>'kkLabel',
						  'label'=>'KK',
					],
					[
						  'attribute'=>'aktaLabel',
						  'label'=>'Akta Kelahiran',
					],
			
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
			//			'footer'=>false
			//		],
			//	'responsive'=>true,
				'hover'=>true,
				'bordered'=> true,
			//	'pjax' => true,
				'striped' => true,
				'condensed' => false,

			]);
		?>
      <!-- / end client details section -->
      

 	  
	  <div class="row">
      	<div class="col-md-3">
        </div>
        <div class="col-md-6">
          
		  <br>
          <br>
          <br>
		  <br>
           <br>
          <br>
          <br>
          
        </div>
		
		<div class="col-md-3">
          <p>
            
			Batang, <?= Yii::$app->formatter->asDate($postdate, 'php:j F Y'); ?> <br>
            Ketua Panitia PPDB <br>
            <br>
           <br>
			<br>
            <?= $tapel->ket_ppdb ?><br>
         <?= $tapel->nip_ket ?> <br>
            
          </p>
        </div>
		
		
      </div>

        </div><!-- /.box-body -->
      </div><!-- /.box -->
			
  </div><!-- /.row -->




