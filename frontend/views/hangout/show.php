<?php 

use yii\helpers\Html;
use kartik\icons\Icon;
use common\models\Joinhangout;
use common\models\Hangout;

// $this->title = "ห้องทั้งหมด";
// $this->params['breadcrumb'] [] = $this->title;
//var_dump($model);
// foreach ($model as $m){
//     echo $m->id;
//     echo $m->topic;
//     echo "<br>";
// }

?>

<div class="container">
	<div class="row">
		<div class="col-md-2">
		<h3><span class="label label-success">สามารถเข้าร่วมได้</span></h3>
		</div>
		<div class="col-md-2">
		<h3><span class="label label-warning">ไม่สามารถเข้าร่วมได้</span></h3>
		</div>
		<div class="pull-right">
			<?php // Html::a('สร้างห้อง','../hangout/create',['class'=>'btn btn-warning']) ?>
			<?php if(Yii::$app->user->isGuest){ ?>
			<h1><a class="btn btn-warning" href="../site/login"><span class="glyphicon glyphicon-plus"></span>สร้างห้อง</a></h1>
			<?php }else{ ?>
			
			<h1><a class="btn btn-warning" href="../hangout/create"><span class="glyphicon glyphicon-plus"></span>สร้างห้อง</a></h1>
			<?php }?>
		</div>
	</div>
	<div class="row">
	 <?php foreach ($model as $m) :?>
	 
		<div class="col-md-4">
		<?php $checktime = time();?>
			<?php //var_dump($model); die(); ?>
			<?php if($m->started_at > $checktime){ ?>
			<div class="panel panel-success">
			<?php }elseif ($m->started_at < $checktime && $m->finished_at > $checktime) {?>
			<div class="panel panel-warning">
			<?php }else {?>
			<div class="panel panel-danger">
			<?php }?>
			<?php $count = Joinhangout::find()->where(['hangout_id'=> $m->id])->count()?>
  				<div class="panel-heading"><h5><span class="glyphicon glyphicon-pushpin"></span> <?=$count+=1?>/<?= $m->maxjoin ?></h5></div>
 			    <div class="panel-body">
 			   		
 			   		<p><span class="glyphicon glyphicon-book"></span> ชื่อห้อง : <?= $m->topic; ?></p>
 			   		<p><span class="glyphicon glyphicon-time"></span> เริ่มเวลา : <?= Yii::$app->formatter->asDatetime($m->started_at) ?></p>
 			   		<p><span class="glyphicon glyphicon-time"></span> ถึงเวลา : <?=Yii::$app->formatter->asDatetime($m->finished_at)?></p>
 			   		<p><span class="glyphicon glyphicon-send"></span> สถานที่ : <?= $m->sportcomplex ?></p>
 			   		<p><span class="glyphicon glyphicon-user"></span> คนสร้าง : <?= $m->createdby->username ?></p>
 			   		
 			   		
 			   		<?php // Html::a('เข้าร่วม','../joinhangout/home?id='.$m->id,['class'=>'btn btn-success']) ?>
 			   		
 			   			<?php if ($count == $m->maxjoin){ ?>
 			   		    		<?php if($m->status == Hangout::STATUS_WAIT){?>
 			   		    		<button class="btn btn-danger" disabled>เข้าร่วม</button>
 			   		    		<?php }else {?>
 			   		    			<button class="btn btn-danger" disabled>เข้าร่วม</button>
 			   		    		
 			   		    		<?php }?>
 			   		    		
 			   			<?php }else {?>
 			   				<?php if($m->status == Hangout::STATUS_WAIT){?>
 			   				<button class="btn btn-danger" disabled>เข้าร่วม</button>
 			   				<?php }else{?>
 			   				<a class="btn btn-success" href="../joinhangout/home?id=<?= $m->id ?>"><span class="glyphicon glyphicon-log-in"></span> เข้าร่วม</a>
 			   				<?php }?>
 			   			<?php }?>
 			   					<button type="button" class="btn btn-info " data-toggle="modal" data-target="#<?=$m->id?>"><span class="glyphicon glyphicon-search"></span> ดูรายละเอียด</button>
 			    </div>
			</div>	
			
			
		</div>
		
		
		
		
		<!-- Modal -->
		<div id="<?=$m->id?>" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-list"></span> รายละเอียดห้อง</h4>
              </div>
              <div class="modal-body">
             
						<p><span class="glyphicon glyphicon-book"></span> ชื่อห้อง :<?= $m->topic ?></p>
						<p><span class="glyphicon glyphicon-list-alt"></span> รายละเอียด :<?= $m->description ?></p>
						<p><span class="glyphicon glyphicon-time"></span> เริ่มเมื่อ :<?= Yii::$app->formatter->asDatetime($m->started_at) ?></p>
						<p><span class="glyphicon glyphicon-time"></span> ถึงเวลา :<?= Yii::$app->formatter->asDatetime($m->finished_at) ?></p>
						<p><span class="glyphicon glyphicon-send"></span> สถานที่ : <?= $m->sportcomplex ?></p>
						<p><span class="glyphicon glyphicon-user"></span> จำนวนคนเข้าร่วม :<?= $m->maxjoin ?></p>
						<p><span class="glyphicon glyphicon-hand-right"></span> รายชื่อคนเข้าร่วม :<?= $m->createdby->username?></p>
						
					
					
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">ปิด</button>
              </div>
            </div>
        
          </div>
        </div>
      
      <?php endforeach; ?>
        
		
	</div>
</div>

