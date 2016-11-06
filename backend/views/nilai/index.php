<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use backend\models\CalonSiswa;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\NilaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rangking Pendaftaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-index">

 

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php
					 $gridColumns =[
					['class' => 'yii\grid\SerialColumn'],
					//	'id_nilai',
					//'kd_tapel',
					'kdCalonSiswa.nama',
					[
						'class'=>'kartik\grid\BooleanColumn',
						  'attribute'=>'kdCalonSiswa.kelamin',
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
					
					//'kd_calon_siswa',
					'no_daftar',
					'kdCalonSiswa.nisn',
					//'status',
					 'b_ina',
					 'b_ing',
					 'mat',
					 'ipa',
					 'prestasi',
					 'domisili',
					 'total',
					// 'postdate',
					// 'id_user',

				
				];
		
		// Generate a bootstrap responsive striped table with row highlighted on hover
			echo GridView::widget([
				'dataProvider'=> $dataProvider,
			//	'filterModel' => $searchModel,
				'columns' => $gridColumns,
				'panel' => [
						'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i>  Rangking Pendaftaran</h3>',
						'type'=>'info',
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
