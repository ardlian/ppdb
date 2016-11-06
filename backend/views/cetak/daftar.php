<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Nilai */

$this->title = 'Cetak Buku Pendaftaran';
$this->params['breadcrumbs'][] = ['label' => 'Pencabutan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-create">

   

    <?= $this->render('_daftar', [
        'model' => $model, 'tapel' => $tapel,
    ]) ?>

</div>
