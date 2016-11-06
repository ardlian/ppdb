<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tapel */

$this->title = 'Update Tapel: ' . $model->kd_tapel;
$this->params['breadcrumbs'][] = ['label' => 'Tapels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_tapel, 'url' => ['view', 'id' => $model->kd_tapel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tapel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
