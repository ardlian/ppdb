<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Nilai */

$this->title = 'Cetak Jurnal';
$this->params['breadcrumbs'][] = ['label' => 'Nilais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-create">

   

    <?= $this->render('_jurnal', [
        'model' => $model, 'tapel' => $tapel,
    ]) ?>

</div>
