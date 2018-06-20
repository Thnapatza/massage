<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Hangout */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hangouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hangout-view">

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
            'topic',
            'description:ntext',
            'created_at:datetime',
            'updated_at:datetime',
            'sport_id',
            'sportcomplex',
            'started_at:datetime',
            'finished_at:datetime',
            'maxjoin',
            'createdby_id',
            'cost',
        ],
    ]) ?>

</div>











