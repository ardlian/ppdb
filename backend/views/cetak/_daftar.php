<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use kartik\datecontrol\DateControl;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\form\FileInput;
use kartik\form\ActiveField;
use backend\models\Pekerjaan;
use kartik\select2\Select2;
use backend\models\Pendidikan;
use backend\models\Agama;
use backend\models\Domisili;
use backend\models\Prestasi;
use yii\web\JsExpression;
use backend\models\Regencies;
use backend\models\Tapel;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model backend\models\Nilai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nilai-form">
<div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Cetak Buku Pendaftaran</h3>
          <span class="label label-primary pull-right"><i class="fa fa-print"></i></span>
        </div><!-- /.box-header -->
        <div class="box-body">
          <?php

			$form = ActiveForm::begin([
					'id' => 'nilai', 
					'type' => ActiveForm::TYPE_HORIZONTAL,
					//'action'=>Yii::$app->request->baseUrl.'/cetak/daftar',
					'options' => [ 'enctype' => 'multipart/form-data'],
					'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
			]); 
			echo $form->field($model, 'postdate', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
			])->input('date')->label('Pilih Tanggal');
			
				echo FormGrid::widget([
				'model'=>$model,
				'form'=>$form,
				'autoGenerateColumns'=>true,
				'rows'=>[
					[
						'attributes'=>[// 3 column layout
						'kd_tapel'=>[
							'label'=>'Tahun Ajaran',
							'type'=>Form::INPUT_STATIC,
							'staticValue'=>$tapel->tapel,
							],
	
						],
					],
					[
						'attributes'=>[// 3 column layout

						'kd_tapel'=>[    // embed raw HTML content
								'type'=>Form::INPUT_RAW,
								'value'=>  '<input type="hidden" id="dynamicmodel-kd_tapel" class="form-control" name="DynamicModel[kd_tapel]" value="'.$tapel->kd_tapel.'">'
							],

						],
						
						
					],
				]

			]);
			echo Html::button(Icon::show('check', ['class' => 'fa-1x'], Icon::BSG).'Pilih Tanggal', [
					'type'=>'submit', 
					'class'=>'btn btn-primary pull-right',
					'data-toggle'=>'tooltip',
					'title'=>'Pilih Tanggal Cetak BUku Pendaftaran',
					]);
			//echo Html::a('Pdf', 'url', ['class' => 'btn btn-primary','name'=>'Pdf', 'target'=>'_blank']);
			ActiveForm::end();
			?>
          <?php

        ?>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
			
  </div><!-- /.row -->


</div>
