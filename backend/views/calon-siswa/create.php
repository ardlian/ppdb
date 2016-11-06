<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CalonSiswa */

$this->title = 'Input Data PPDB TA '.$tapel->tapel;
$this->params['breadcrumbs'][] = ['label' => 'Calon Siswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calon-siswa-create">

    <?= $this->render('_form', [
        'model' => $model, 'nilai' => $nilai, 'tapel' => $tapel,
    ]) ?>

</div>
