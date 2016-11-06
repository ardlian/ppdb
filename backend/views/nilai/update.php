<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Nilai */

$this->title = 'Update Nilai: ' . $model->id_nilai;
$this->params['breadcrumbs'][] = ['label' => 'Nilais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_nilai, 'url' => ['view', 'id' => $model->id_nilai]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nilai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
