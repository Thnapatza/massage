<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Joinhangout */

$this->title = 'Update Joinhangout: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Joinhangouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="joinhangout-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
