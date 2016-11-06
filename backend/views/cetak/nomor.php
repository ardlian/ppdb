<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Nilai */

$this->title = 'Cetak Nomor Pendaftaran';
$this->params['breadcrumbs'][] = ['label' => 'Nilais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-create">

   

    <?= $this->render('_nomor', [
        'model' => $model, 'tapel' => $tapel,
    ]) ?>

</div>
