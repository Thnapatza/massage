<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Garantee */

$this->title = 'Create Garantee';
$this->params['breadcrumbs'][] = ['label' => 'Garantees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="garantee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
