<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CalonSiswa */

$this->title = 'Update Calon Siswa: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Calon Siswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_calon, 'url' => ['view', 'id_calon' => $model->id_calon, 'no_daftar' => $model->no_daftar]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="calon-siswa-update">

    <?= $this->render('_form', [
        'model' => $model, 'nilai' => $nilai, 'tapel' => $tapel,
    ]) ?>

</div>
