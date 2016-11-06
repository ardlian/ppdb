<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Nilai */

$this->title = 'Cetak Buku Pencabutan';
$this->params['breadcrumbs'][] = ['label' => 'Pencabutan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-create">

   

    <?= $this->render('_cabut', [
        'model' => $model, 'tapel' => $tapel,
    ]) ?>

</div>
