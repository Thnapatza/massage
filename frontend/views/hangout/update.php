<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hangout */

$this->title = 'แก้ไขห้อง'// . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Hangouts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hangout-update">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'alert'=>$alert
    ]) ?>

</div>
