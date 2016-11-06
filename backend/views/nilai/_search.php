<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NilaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nilai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_nilai') ?>

    <?= $form->field($model, 'kd_tapel') ?>

    <?= $form->field($model, 'kd_calon_siswa') ?>

    <?= $form->field($model, 'no_daftar') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'b_ina') ?>

    <?php // echo $form->field($model, 'b_ing') ?>

    <?php // echo $form->field($model, 'mat') ?>

    <?php // echo $form->field($model, 'ipa') ?>

    <?php // echo $form->field($model, 'prestasi') ?>

    <?php // echo $form->field($model, 'domisili') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'postdate') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
