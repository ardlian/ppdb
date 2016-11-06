<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Nilai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nilai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_tapel')->textInput() ?>

    <?= $form->field($model, 'kd_calon_siswa')->textInput() ?>

    <?= $form->field($model, 'no_daftar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'b_ina')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_ing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prestasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'domisili')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postdate')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
