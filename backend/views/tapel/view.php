<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tapel */

$this->title = $model->kd_tapel;
$this->params['breadcrumbs'][] = ['label' => 'Tapels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tapel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kd_tapel], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kd_tapel], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tapel',
            'kd_tapel',
            'status',
            'daya_tampung',
            'tahun',
        ],
    ]) ?>

</div>
