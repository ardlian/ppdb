<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tapel */

$this->title = 'Create Tapel';
$this->params['breadcrumbs'][] = ['label' => 'Tapels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tapel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
