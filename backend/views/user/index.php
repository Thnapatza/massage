<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการสมาชิก';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'fb_id',
            'fname',
            'lname',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            // 'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'power',

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
                    return Html::a('ดู','../user/view?id='.$model->id,['class'=>'btn btn-info']);
                    },
                    
                    'update' => function($url,$model,$key){
                    return Html::a('แก้ไช','../user/update?id='.$model->id,['class'=> 'btn btn-warning']);
                    },
                    
                    'delete' => function($url,$model,$key){
                    return Html::a('ลบ','../user/delete?id='.$model->id,['class'=>'btn btn-danger']);
                    }
                  ]  
                
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
