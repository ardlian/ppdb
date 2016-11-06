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

/* @var $this yii\web\View */
/* @var $model backend\models\CalonSiswa */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">

    <div class="col-sm-12">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Data Siswa</h3>
          <span class="label label-danger pull-right"><i class="fa fa-database"></i></span>
        </div><!-- /.box-header -->
        <div class="box-body">
	
		  <div class="calon-siswa-form">

			<?php $form = ActiveForm::begin(); ?>

			<?= $form->field($model, 'kd_tapel')->textInput() ?>

			<?= $form->field($model, 'no_daftar')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'tmpat_lahir')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'tgl_lahir')->textInput() ?>

			<?= $form->field($model, 'agama')->textInput() ?>

			<?= $form->field($model, 'kelamin')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

			<?= $form->field($model, 'anak_ke')->textInput() ?>
			
			<?= $form->field($model, 'tb')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'bb')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'hp')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>
						
			<?= $form->field($model, 'no_sttb')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'nisn')->textInput() ?>
				<div class="box-header with-border">
				<h3 class="box-title">Data Sekolah Asal</h3>
				<span class="label label-danger pull-right"><i class="fa fa-database"></i></span>
				</div><!-- /.box-header -->
			<?= $form->field($model, 'sekolah_asal')->textInput(['maxlength' => true]) ?>
			
			<?= $form->field($model, 'status_sekolah')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

			<?= $form->field($model, 'alamat_sekolah')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'thn_lulus')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'nama_ayah')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'kerja_ayah')->textInput() ?>

			<?= $form->field($model, 'pen_ayah')->textInput() ?>

			<?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'kerja_ibu')->textInput() ?>

			<?= $form->field($model, 'pend_ibu')->textInput() ?>

			<?= $form->field($model, 'alamat_ortu')->textInput(['maxlength' => true]) ?>
			
			<?= $form->field($model, 'hp_ortu')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'nama_wali')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'kerja_wali')->textInput() ?>

			<?= $form->field($model, 'pend_wali')->textInput() ?>

			<?= $form->field($model, 'alamat_wali')->textInput(['maxlength' => true]) ?>
			
			<?= $form->field($model, 'hp_wali')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'tgl_daftar')->textInput() ?>

			<?= $form->field($model, 'status_daftar')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

			<?= $form->field($model, 'status_diterima')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

			<?= $form->field($model, 'pencabutan')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

			<?= $form->field($model, 'validasi')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

			<?= $form->field($model, 'id_pendaftar')->textInput() ?>

			<?= $form->field($model, 'id_validator')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'syarat_foto')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

			<?= $form->field($model, 'syarat_sttb')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

			<?= $form->field($model, 'syarat_skhus')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

			<?= $form->field($model, 'syarat_sertifikat')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

			<?= $form->field($model, 'syarat_kk')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

			<?= $form->field($model, 'syarat_akta')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

			<div class="form-group">
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>

			</div>

        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
<?php
$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL, 'action'=>Yii::$app->request->baseUrl.'/rumah/create', 'options' => [ 'enctype' => 'multipart/form-data']]);
echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [
            'attributes'=>[       // 2 column layout
                'kd_tapel'=>[
                    'type'=>Form::INPUT_STATIC,
                    'staticValue'=>23,
                    'options'=>[

                    ],

                ],
              //  'id_kec'=>['type'=>Form::INPUT_STATIC, 'staticValue'=>$kecamatan, 'options'=>[]],
              //  'id_desa'=>['type'=>Form::INPUT_STATIC, 'staticValue'=>$desa,'options'=>[]],
             //   'nama'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nama file foto...']],
             //   'file'=>['type'=>Form::INPUT_FILE, 'options'=>['placeholder'=>'Pilih foto...']],
            ]
        ],
        [
            'attributes'=>[       // 2 column layout
                'nama'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Isikan no rumah']],
                'tmpat_lahir'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Isikan RT..']],
                'alamat'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Isikan RW..']],
                'nama_wali'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Dusun...']],
            ]
        ],
    ]
]);
ActiveForm::end();
?>
