<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\HangoutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hangouts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hangout-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hangout', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'topic',
            //'description:ntext',
            //'created_at',
            //'updated_at',
            // 'sport_id',
             'sportcomplex',
            // 'started_at',
            // 'finished_at',
            // 'maxjoin',
            // 'createdby_id',
            // 'cost',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
