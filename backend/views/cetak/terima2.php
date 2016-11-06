<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Nilai */

$this->title = 'Cetak diterima';
$this->params['breadcrumbs'][] = ['label' => 'Cetak', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-create">

   

    <?= $this->render('_terima', [
        'model' => $model, 'tapel' => $tapel,
    ]) ?>

</div>
