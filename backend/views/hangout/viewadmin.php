<?php 
use yii\helpers\Html;
use fedemotta\datatables\DataTables;
use yii\grid\GridView;
use yii\base\Widget;
?>
<?php //var_dump($model); die(); ?>
<div class="container">

	<p><a class=" btn btn-success" href="../sport/create">เพิ่มชนิดกีฬา</a></p>

<?=GridView::widget([
    
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn',
          'options' => []
        ],
       'id',
        'name',
        
        [
            'class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {update} {delete}',
            'options'=> ['style'=>'width:20%;'],
            'contentOptions'=>[
                'noWrap' => true
            ],
            'header'=> '',
            'buttons'=>[
                'view' => function($url,$model,$key){
                    return Html::a('ดู','../hangout/allroom2?id='.$model->id,['class'=>'btn btn-success']);
                },
                
                'update' => function($url,$model,$key){
                    return Html::a('แก้ไช','../sport/update?id='.$model->id,['class'=> 'btn btn-warning']);
                },
                
                'delete' => function($url,$model,$key){
                    return Html::a('ลบ','../sport/delete?id='.$model->id,['class'=>'btn btn-danger']);  
                }
                
                ],
            
            ]
               
    ],
   
]); ?>


</div>
