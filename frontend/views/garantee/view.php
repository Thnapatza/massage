<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Garantee */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Garantees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="garantee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'started_at',
            'updated_at',
            'joinhangout_id',
            'user_id',
        ],
    ]) ?>

</div>
