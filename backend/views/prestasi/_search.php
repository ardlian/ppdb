<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PrestasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prestasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_prestasi') ?>

    <?= $form->field($model, 'tingkat') ?>

    <?= $form->field($model, 'peringkat') ?>

    <?= $form->field($model, 'wilayah') ?>

    <?= $form->field($model, 'skor') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <?php // echo $form->field($model, 'kd_tapel') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
