<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
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
use kartik\datecontrol\Module;
//use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model backend\models\CalonSiswa */
/* @var $form yii\widgets\ActiveForm */
if (!isset($model->syarat_foto) && !isset($model->syarat_skhus)  && !isset($model->syarat_kk) && !isset($model->syarat_akta)){
	$model->syarat_foto=1;
	$model->syarat_skhus=1;
	$model->syarat_kk=1;
	$model->syarat_akta=1;
} 
echo $model->syarat_akta;
$nilai->prestasi = $nilai->id_prestasi;
$nilai->domisili = $nilai->id_domisili;
$url = \yii\helpers\Url::to(['regencies/kab-list']);
$cityDesc = empty($model->regencies) ? '' : Regencies::findOne($model->regencies)->description;
?>
<div class="row">

    <div class="col-sm-12">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Data Siswa</h3>
          <span class="label label-danger pull-right"><i class="fa fa-database"></i></span>
        </div><!-- /.box-header -->
        <div class="box-body">
	
		  <?php

			 $form = ActiveForm::begin([
					'id' => 'pendaftaran-form-horizontal', 
					'type' => ActiveForm::TYPE_HORIZONTAL,
					'options' => [ 'enctype' => 'multipart/form-data'],
					'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
			]); 
			echo $form->field($model, 'nama', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-user"></i>']]
			]);
			echo $form->field($model, 'tmpat_lahir')->widget(Select2::classname(), [
				'initValueText' => $cityDesc, // set the initial display text
				'options' => ['placeholder' => 'Pilih Kabupaten ...'],
				'pluginOptions' => [
					'allowClear' => true,
					'minimumInputLength' => 3,
					'language' => [
						'errorLoading' => new JsExpression("function () { return 'Menunggu hasil pencarian...'; }"),
					],
					'ajax' => [
						'url' => $url,
						'dataType' => 'json',
						'data' => new JsExpression('function(params) { return {q:params.term}; }')
					],
					'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
					'templateResult' => new JsExpression('function(regencies) { return regencies.text; }'),
					'templateSelection' => new JsExpression('function (regencies) { return regencies.text; }'),
				],
			]);
			
			//echo $form->field($model, 'tgl_lahir', [
			//	'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
			//])->input('date');
			
			?>
			
			<div class="form-group field-calonsiswa-tgl_lahir required">
			<label class="control-label col-sm-3" for="calonsiswa-tgl_lahir">Tanggal Lahir</label>
			<div class="col-sm-9">
			<?php
			 echo DatePicker::widget([
                'name' => 'CalonSiswa[tgl_lahir]',
                'value' => $model->tgl_lahir,
                'options' => ['placeholder' => 'yyyy-mm-dd ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'autoclose'=>true,
                ]
            ]);
			?>
			<div class="col-sm-offset-3 col-sm-9"></div>
			<div class="col-sm-offset-3 col-sm-9"><div class="help-block"></div></div>
			</div></div>
          

			<?php
			 			
			echo $form->field($model, 'kelamin')->dropDownList(['1' => 'Laki-Laki', '0' => 'Perempuan'], ['prompt'=>'Pilih Jenis Kelamin']);
			echo $form->field($model, 'nisn', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-file"></i>']]
			]);
			echo $form->field($model, 'no_sttb', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-file"></i>']]
			]);
				//use app\models\Country;
				$agama=Agama::find()->all();

				//use yii\helpers\ArrayHelper;
				$listAgama=ArrayHelper::map($agama,'id_agama','ket');
					
				echo $form->field($model, 'agama')->widget(Select2::classname(), [
					'data' => $listAgama,
					'language' => 'id',
					'options' => ['placeholder' => 'Pilih Agama ...'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]);	

			echo $form->field($model, 'anak_ke', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-plus-sign"></i>']]
			]);
			echo $form->field($model, 'tb', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-resize-vertical"></i>'], 'append' => ['content'=>'cm']]
			]);
			echo $form->field($model, 'bb', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-scale"></i>'], 'append' => ['content'=>'kg']]
			]);
			echo $form->field($model, 'alamat', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
			])->textarea();
			echo $form->field($model, 'hp', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]
			]);
			?>
			
			<div class="box-header with-border">
			<h3 class="box-title">Data Sekolah Asal</h3>
			</div><!-- /.box-header -->
			<br/>
			<?php
			
			echo $form->field($model, 'sekolah_asal', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-home"></i>']]
			]);
			echo $form->field($model, 'status_sekolah')->dropDownList(['1' => 'Negeri', '0' => 'Swasta'], ['prompt'=>'Pilih Jenis Sekolah...']);
						echo $form->field($model, 'alamat_sekolah', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-road"></i>']]
			])->textarea();
									echo $form->field($model, 'thn_lulus', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
			]);
			
			?>
						<div class="box-header with-border">
			<h3 class="box-title">Data Nilai Ujian Nasional</h3>
			</div><!-- /.box-header -->
			<br/>
			<?php

			echo $form->field($nilai, 'b_ina', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-edit"></i>']]
			])->textInput(['placeholder' => 'Ganti tanda koma dengan tanda titik (contoh 24.35) ...']) ;
			echo $form->field($nilai, 'b_ing', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-edit"></i>']]
			])->textInput(['placeholder' => 'Ganti tanda koma dengan tanda titik (contoh 24.35) ...']) ;
			echo $form->field($nilai, 'mat', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-edit"></i>']]
			])->textInput(['placeholder' => 'Ganti tanda koma dengan tanda titik (contoh 24.35) ...']) ;
			echo $form->field($nilai, 'ipa', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-edit"></i>']]
			])->textInput(['placeholder' => 'Ganti tanda koma dengan tanda titik (contoh 24.35) ...']) ;
						
			?>
			<div class="box-header with-border">
			<h3 class="box-title">Data Bonus</h3>
			</div><!-- /.box-header -->
			<br/>
			<?php
				
			
				//use app\models\Country;
				$domisili=Domisili::find()->all();

				//use yii\helpers\ArrayHelper;
				$listDomisili=ArrayHelper::map($domisili,'id_domisili','ket');
					
				echo $form->field($nilai, 'domisili')->widget(Select2::classname(), [
					'data' => $listDomisili,
					'language' => 'en',
					'options' => ['placeholder' => 'Pilih Bonus Domisili ...'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]);	
			
			//use app\models\Country;
				$prestasi=Prestasi::find()->all();

				//use yii\helpers\ArrayHelper;
				$listPrestasi=ArrayHelper::map($prestasi,'id_prestasi','ket');
					
				echo $form->field($nilai, 'prestasi')->widget(Select2::classname(), [
					'data' => $listPrestasi,
					'language' => 'en',
					'options' => ['placeholder' => 'Pilih Bonus Prestasi ...'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]);	
				

			?>
			
			<div class="box-header with-border">
			<h3 class="box-title">Data Orang Tua</h3>
			</div><!-- /.box-header -->
			<br/>
			<?= $form->field($model, 'nama_ayah', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-home"></i>']]
			]); ?>
						
			<?php
				//use app\models\Country;
				$countries=Pekerjaan::find()->all();

				//use yii\helpers\ArrayHelper;
				$listData=ArrayHelper::map($countries,'id_kerja','ket');
					
				echo $form->field($model, 'kerja_ayah')->widget(Select2::classname(), [
					'data' => $listData,
					'language' => 'en',
					'options' => ['placeholder' => 'Pilih Pekerjaan ...'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]);	
			?>
			<?php
			//use app\models\Country;
			$pend=Pendidikan::find()->all();

			//use yii\helpers\ArrayHelper;
			$pendidikan=ArrayHelper::map($pend,'id_pend','ket');

			echo $form->field($model, 'pen_ayah')->widget(Select2::classname(), [
					'data' => $pendidikan,
					'language' => 'en',
					'options' => ['placeholder' => 'Pilih Pendidikan Terakhir...'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]);		
			?>
			<?php
						echo $form->field($model, 'nama_ibu', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
			]);
						
			echo $form->field($model, 'kerja_ibu')->widget(Select2::classname(), [
					'data' => $listData,
					'language' => 'en',
					'options' => ['placeholder' => 'Pilih Pekerjaan ...'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]);	
				
			echo $form->field($model, 'pend_ibu')->widget(Select2::classname(), [
					'data' => $pendidikan,
					'language' => 'en',
					'options' => ['placeholder' => 'Pilih Pendidikan Terakhir...'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]);
			
						echo $form->field($model, 'alamat_ortu', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
			])->textarea();
						echo $form->field($model, 'hp_ortu', [
				'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
			]);
			?>
			<div class="box-header with-border">
			<h3 class="box-title">Data Wali <code>(tidak perlu diisi jika data ortu sudah diisi)</code></h3>
			</div><!-- /.box-header -->
			<br/>
			<?php
			echo $form->field($model, 'nama_wali', [
			'hintType' => ActiveField::HINT_DEFAULT,
			'hintSettings' => [
				'showIcon' => false,
				'title' => '<i class="glyphicon glyphicon-info-sign"></i> Note'
				]
			]);
			
			echo $form->field($model, 'kerja_wali')->widget(Select2::classname(), [
					'data' => $listData,
					'language' => 'en',
					'options' => ['placeholder' => 'Pilih Pekerjaan ...'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]);	
			echo $form->field($model, 'pend_wali')->widget(Select2::classname(), [
					'data' => $pendidikan,
					'language' => 'en',
					'options' => ['placeholder' => 'Pilih Pendidikan Terakhir...'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]);	

			echo $form->field($model, 'alamat_wali', [
			'hintType' => ActiveField::HINT_DEFAULT,
			'hintSettings' => [
				'showIcon' => false,
				'title' => '<i class="glyphicon glyphicon-info-sign"></i> Note'
				]
			])->textarea();
			echo $form->field($model, 'hp_wali', [
			'hintType' => ActiveField::HINT_DEFAULT,
			'hintSettings' => [
				'showIcon' => false,
				'title' => '<i class="glyphicon glyphicon-info-sign"></i> Note'
				]
			]);
			?>
			
			<div class="box-header with-border">
			<h3 class="box-title">Kelengkapan Dokumen</h3>
			</div><!-- /.box-header -->
			<br/>
			<input type="hidden" id="Nilai-kd_tapel" class="form-control" name="Nilai[kd_tapel]" value="<?= $tapel->kd_tapel ?>">
			<?= $form->field($model, 'syarat_foto')->checkbox() ?>
			<?= $form->field($model, 'syarat_sttb')->checkbox() ?>
			<?= $form->field($model, 'syarat_skhus')->checkbox() ?>
			<?= $form->field($model, 'syarat_sertifikat')->checkbox() ?>
			<?= $form->field($model, 'syarat_kk')->checkbox() ?>
			<?= $form->field($model, 'syarat_akta')->checkbox() ?>
			<?= $form->field($model, 'syarat_dinas_asal')->checkbox() ?>
			<?= $form->field($model, 'syarat_dinas_batang')->checkbox() ?>

			<?php
				echo FormGrid::widget([
				'model'=>$model,
				'form'=>$form,
				'autoGenerateColumns'=>true,
				'rows'=>[
					[
						'attributes'=>[// 3 column layout
							'tgl_daftar'=>[    // embed raw HTML content
								'type'=>Form::INPUT_RAW,
								'value'=>  '<input type="hidden" id="CalonSiswa-tgl_daftar" class="form-control" name="CalonSiswa[tgl_daftar]" value="'.date('Y-m-d').'">'
							],
							'status_daftar'=>[    // embed raw HTML content
								'type'=>Form::INPUT_RAW,
								'value'=>  '<input type="hidden" id="CalonSiswa-status_daftar" class="form-control" name="CalonSiswa[status_daftar]" value="1">'
							],
							'pencabutan'=>[    // embed raw HTML content
								'type'=>Form::INPUT_RAW,
								'value'=>  '<input type="hidden" id="CalonSiswa-pencabutan" class="form-control" name="CalonSiswa[pencabutan]" value="0">'
							],
							'validasi'=>[    // embed raw HTML content
								'type'=>Form::INPUT_RAW,
								'value'=>  '<input type="hidden" id="CalonSiswa-validasi" class="form-control" name="CalonSiswa[validasi]" value="0">'
							],
							'kd_tapel'=>[    // embed raw HTML content
								'type'=>Form::INPUT_RAW,
								'value'=>  '<input type="hidden" id="CalonSiswa-kd_tapel" class="form-control" name="CalonSiswa[kd_tapel]" value="'.$tapel->kd_tapel.'">'
							],
							'id_pendaftar'=>[    // embed raw HTML content
								'type'=>Form::INPUT_RAW,
								'value'=>  '<input type="hidden" id="CalonSiswa-id_pendaftar" class="form-control" name="CalonSiswa[id_pendaftar]" value="'.Yii::$app->user->identity->id.'">'
							],
							'id_user'=>[    // embed raw HTML content
								'type'=>Form::INPUT_RAW,
								'value'=>  '<input type="hidden" id="Nilai-id_user" class="form-control" name="Nilai[id_user]" value="'.Yii::$app->user->identity->id.'">'
							],
							'id_validator'=>[    // embed raw HTML content
								'type'=>Form::INPUT_RAW,
								'value'=>  '<input type="hidden" id="CalonSiswa-id_validator" class="form-control" name="CalonSiswa[id_validator]" value="">'
							],
							'no_daftar'=>[    // embed raw HTML content
								'type'=>Form::INPUT_RAW,
								'value'=>  '<input type="hidden" id="CalonSiswa-no_daftar" class="form-control" name="CalonSiswa[no_daftar]" value="">'
							],
							'actions'=>[    // embed raw HTML content
								'type'=>Form::INPUT_RAW,
								'value'=>  '<div style="text-align: right; margin-top: 10px">' .
												
				Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']).

									'</div>'
							],
						],
					],
				]
			]);
			
			ActiveForm::end();
		?>

        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
