<?php  use fedemotta\datatables\DataTables;
use yii\helpers\Html;

?>
<div class="container">
	<div class="row">
	 <?php $id = $_GET['id']; ?>
		<a class="btn btn-primary" href="../hangout/allroom?id=<?=$id ?>">ห้องทั้งหมด</a>
		<a class="btn btn-success" href="../hangout/allroomshow?id=<?=$id ?>">ห้องที่แสดงอยู่</a>
		<a class="btn btn-warning" href="../hangout/allroomwait?id=<?=$id ?>">ห้องที่เล่นอยู่</a>
		<a class="btn btn-danger" href="../hangout/allroomhidden?id=<?=$id ?>">ห้องที่เล่นแล้ว</a><br>
	</div>
	<br>
<?= DataTables::widget([

    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'clientOptions' => [
        "lengthMenu"=> [[10,-1], [10,Yii::t('app',"All")]],
        "info"=>false,
        "responsive"=>true,
//        "dom"=> 'lfTrtip',
//        "tableTools"=>[
//             "aButtons"=> [
//                 [
//                 "sExtends"=> "copy",
//                 "sButtonText"=> Yii::t('app',"Copy to clipboard")
//             ],[
//                 "sExtends"=> "csv",
//                 "sButtonText"=> Yii::t('app',"Save to CSV")
//             ],[
//                 "sExtends"=> "xls",
//                 "oSelectorOpts"=> ["page"=> 'current']
//             ],[
//                 "sExtends"=> "pdf",
//                 "sButtonText"=> Yii::t('app',"Save to PDF")
//             ],
//                 [
//                     "sExtends"=> "print",
//                     "sButtonText"=> Yii::t('app',"Search")
//                 ],
//             ]
//        ]
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'topic',
        'sport.name',
        'started_at:dateTime',
        'finished_at:dateTime',
        'sportcomplex',
        'createdby.username',
        'created_at:dateTime',
        'updated_at:dateTime',
        

        [
            'class' => 'yii\grid\ActionColumn',
            'template'=>'{delete}',
            'options'=> ['style'=>'width:20%;'],
            'contentOptions'=>[
                'noWrap' => true
            ],
            'header'=> '',
            'buttons'=>[
               //'view' => function($url,$model,$key){
               // return Html::a('ดู','../hangout/allroom?id='.$model->id,['class'=>'btn btn-success']);
               // },
                
               // 'update' => function($url,$model,$key){
               // return Html::a('แก้ไช','../hangout/update?id='.$model->id,['class'=> 'btn btn-warning']);
               // },
                
                'delete' => function($url,$model,$key){
                return Html::a('ลบ','../hangout/delete?id='.$model->id.'&type='.$model->sport->id,[
                    'class'=>'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]);
                }
                
                ],
                
                ]
        
    ],
]);?>
</div>