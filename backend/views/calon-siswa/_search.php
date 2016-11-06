<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CalonSiswaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calon-siswa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kd_tapel') ?>

    <?= $form->field($model, 'id_calon') ?>

    <?= $form->field($model, 'no_daftar') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'tmpat_lahir') ?>

    <?php // echo $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'kelamin') ?>

    <?php // echo $form->field($model, 'anak_ke') ?>

    <?php // echo $form->field($model, 'hp') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'nama_ayah') ?>

    <?php // echo $form->field($model, 'kerja_ayah') ?>

    <?php // echo $form->field($model, 'pen_ayah') ?>

    <?php // echo $form->field($model, 'nama_ibu') ?>

    <?php // echo $form->field($model, 'kerja_ibu') ?>

    <?php // echo $form->field($model, 'pend_ibu') ?>

    <?php // echo $form->field($model, 'alamat_ortu') ?>

    <?php // echo $form->field($model, 'nama_wali') ?>

    <?php // echo $form->field($model, 'kerja_wali') ?>

    <?php // echo $form->field($model, 'pend_wali') ?>

    <?php // echo $form->field($model, 'alamat_wali') ?>

    <?php // echo $form->field($model, 'sekolah_asal') ?>

    <?php // echo $form->field($model, 'alamat_sekolah') ?>

    <?php // echo $form->field($model, 'no_sttb') ?>

    <?php // echo $form->field($model, 'nisn') ?>

    <?php // echo $form->field($model, 'hp_ortu') ?>

    <?php // echo $form->field($model, 'hp_wali') ?>

    <?php // echo $form->field($model, 'thn_lulus') ?>

    <?php // echo $form->field($model, 'tgl_daftar') ?>

    <?php // echo $form->field($model, 'status_daftar') ?>

    <?php // echo $form->field($model, 'status_diterima') ?>

    <?php // echo $form->field($model, 'pencabutan') ?>

    <?php // echo $form->field($model, 'validasi') ?>

    <?php // echo $form->field($model, 'tb') ?>

    <?php // echo $form->field($model, 'bb') ?>

    <?php // echo $form->field($model, 'id_pendaftar') ?>

    <?php // echo $form->field($model, 'id_validator') ?>

    <?php // echo $form->field($model, 'status_sekolah') ?>

    <?php // echo $form->field($model, 'syarat_foto') ?>

    <?php // echo $form->field($model, 'syarat_sttb') ?>

    <?php // echo $form->field($model, 'syarat_skhus') ?>

    <?php // echo $form->field($model, 'syarat_sertifikat') ?>

    <?php // echo $form->field($model, 'syarat_kk') ?>

    <?php // echo $form->field($model, 'syarat_akta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
