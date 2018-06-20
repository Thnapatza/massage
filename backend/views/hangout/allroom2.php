<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\HangoutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลห้อง';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hangout-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Hangout', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'topic',
            'description:ntext',
            //'created_at',
            //'updated_at',
            'sport.name',
             'sportcomplex',
             'started_at:dateTime',
             'finished_at:dateTime',
             'maxjoin',
             'createdby.username',
             'cost',
             'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}  {update} {delete}',
                'options'=> ['style'=>'width:20%;'],
                'contentOptions'=>[
                    'noWrap' => true
                ],
                'header'=> '',
                'buttons'=>[
                    'view' => function($url,$model,$key){
                     return Html::a('ดู','http://localhost/sport/joinhangout/home?id='.$model->id,['class'=>'btn btn-info']);
                     },
                    
                    'update' => function($url,$model,$key){
                    return Html::a('แก้ไช','../hangout/update?id='.$model->id,['class'=> 'btn btn-warning']);
                    },
                    
                    'delete' => function($url,$model,$key){
                    return Html::a('ลบ','../hangout/delete?id='.$model->id,['class'=>'btn btn-danger']);
                    }
                    
                    ],
                    
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
