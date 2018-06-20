<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Hangout */

$this->title = 'Create Hangout';
$this->params['breadcrumbs'][] = ['label' => 'Hangouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hangout-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
