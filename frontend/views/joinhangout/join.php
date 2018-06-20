<?php 
use yii\helpers\Html;
use common\models\User;
use common\models\Joinhangout;
?>
<style type="text/css">
.chat-box {border: 1px solid gray; height: 20em; overflow-y: scroll;}
</style>

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					รายละเอียดห้อง
				</div>
				<div class="panel panel-body">
					<?php foreach ($room as $r) :?>
					
						<p>ชื่อห้อง : <?= $r->topic ?></p>
						<p>รายละเอียด : <?= $r->description ?></p>
						<p>ชื่อสถานที่ : <?= $r->sportcomplex ?></p>
						<p>ตำแหน่งที่อยู่ : <?= $r->location ?></p>
						<p>เริ่มเวลา : <?= Yii::$app->formatter->asDatetime($r->started_at) ?></p>
						<p>ถึงเวลา : <?= Yii::$app->formatter->asDatetime($r->finished_at) ?></p>
						<p>จำนวนคนเข้าร่วม : <?= Joinhangout::find()->where(['hangout_id'=>$r->id])->count() +1?>/<?= $r->maxjoin ?></p>
						<p>รายชื่อคนเข้าร่วม : <?= $r->createdby->username?></p>
						<a class="btn btn-info" href="../map/index?lat=<?=$r->lat?>&lng=<?=$r->lng?>&id=<?=$r->id?>">นำเส้นทาง</a>
					<?php if ($check_join != Null){?>
						<?php $checktime = time();?>
						<?php if($r->started_at<$checktime){
                           }else{?>
						<a class="btn btn-danger" href="../joinhangout/deletejoin?id=<?= Yii::$app->user->id ?>">ยกเลิก</a>
							<?php }?>
					 <?php }else{ ?> 
					 	<?php $checktime = time(); ?>
					 	<?php if($r->started_at < $checktime){
					 	  
                            }else {?>
					 	<?=(Yii::$app->user->id == $r->createdby_id?Html::a(
						    'แก้ไข',
						    '../hangout/update?id='.$r->id,
						    ['class'=>'btn btn-warning']) : Html::a(
						        'เข้าร่วม',
						        '../joinhangout/savejoin?id='.$r->id,
						        ['class'=>'btn btn-success']))?>
					   <?=(Yii::$app->user->id == $r->createdby_id?Html::a(
  				            'ยกเลิก',
  				            '../hangout/delete?id='.$r->id,
  				            ['class'=>'btn btn-danger','data' => [
                                'confirm' => 'ยืนยัน',
                                'method' => 'post',
                            ],]): '')?>
                            <?php }?>
					 <?php }?>
					 
					  
					<?php  endforeach;?>
				</div>
			</div>
			
			
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-5">
			<div class="panel panel-info">
  			<div class="panel-heading">รายชื่อผู้เข้าร่วม</div>
  			<div class="panel-body">
  			<?php foreach ($room as $r) :?>
						<h5 class="text-primary">
						<?php if($r->createdby->power == User::POWER_1) {
        				       echo Html::img('@web/images/user/powerg1.png',['width'=>'7%']);  
        				       echo Html::img('https://graph.facebook.com/'.$r->createdby->fb_id.'/picture?type=large',['width'=>'20%']);
        				   }elseif ($r->createdby->power == User::POWER_2){
        				       echo Html::img('@web/images/user/powerg2.png',['width'=>'7%']);
        				       echo Html::img('https://graph.facebook.com/'.$r->createdby->fb_id.'/picture?type=large',['width'=>'20%']);
        				   }elseif ($r->createdby->power == User::POWER_3){
        				       echo Html::img('@web/images/user/powerg3.png',['width'=>'7%']);
        				       echo Html::img('https://graph.facebook.com/'.$r->createdby->fb_id.'/picture?type=large',['width'=>'20%']);
        				   }elseif ($r->createdby->power == User::POWER_4){
        				       echo Html::img('@web/images/user/powerg4.png',['width'=>'7%']);
        				       echo Html::img('https://graph.facebook.com/'.$r->createdby->fb_id.'/picture?type=large',['width'=>'20%']);
        				   }else{
        				       echo Html::img('@web/images/user/powerg5.png',['width'=>'7%']);
        				       echo Html::img('https://graph.facebook.com/'.$r->createdby->fb_id.'/picture?type=large',['width'=>'20%']);
        			
        				   }?>
						<?= $r->createdby->username?>
						<div class="pull-right">
							<a class="btn btn-warning btn-xs" href="../user/profile?id=<?=$r->createdby_id ?>">ดูข้อมูล</a>
						</div>
						</h5>
					<?php  endforeach;?>
  			<?php foreach ($join as $j) : ?>
  				<h5><?php if($j->user->power == User::POWER_1) {
  				               echo Html::img('https://graph.facebook.com/'.$j->user->fb_id.'/picture?type=large',['width'=>'20%']);
        				       echo Html::img('@web/images/user/powerg1.png',['width'=>'7%']);
        				   }elseif ($j->user->power == User::POWER_2){
        				       echo Html::img('@web/images/user/powerg2.png',['width'=>'7%']);
        				       echo Html::img('https://graph.facebook.com/'.$j->user->fb_id.'/picture?type=large',['width'=>'20%']);
        				   }elseif ($j->user->power == User::POWER_3){
        				       echo Html::img('@web/images/user/powerg3.png',['width'=>'7%']);
        				       echo Html::img('https://graph.facebook.com/'.$j->user->fb_id.'/picture?type=large',['width'=>'20%']);
        				   }elseif ($j->user->power == User::POWER_4){
        				       echo Html::img('@web/images/user/powerg4.png',['width'=>'7%']);
        				       echo Html::img('https://graph.facebook.com/'.$j->user->fb_id.'/picture?type=large',['width'=>'20%']);
        				   }else{
        				       echo Html::img('@web/images/user/powerg5.png',['width'=>'7%']);
        				       echo Html::img('https://graph.facebook.com/'.$j->user->fb_id.'/picture?type=large',['width'=>'20%']);
        				   }?> <?= $j->user->username ?> 
  				<div class="pull-right">
  				<?php $checktime = time(); ?>
  				<?php if($r->started_at < $checktime){ ?>
  				    <a class="btn btn-warning btn-xs" href="../user/profile?id=<?= $j->user_id ?>">ดูข้อมูล</a>
  				<?php }else { ?>
  				<a class="btn btn-warning btn-xs" href="../user/profile?id=<?= $j->user_id ?>">ดูข้อมูล</a>
  				<?=(Yii::$app->user->id == $r->createdby_id?Html::a(
  				    'เตะ',
  				    '../joinhangout/deletejoin?id='.$j->user_id,
  				    ['class'=>'btn btn-danger btn-xs','data' => [
                        'confirm' => 'ยืนยัน',
                        'method' => 'post',
                    ],]): '')?>
                    <?php }?></div></h5>
  				
  			<?php endforeach; ?>
  			</div>
		</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
  			<div class="panel-heading">แชท</div>
  			<div class="panel-body chat-box " style="height:300px; overflow:auto">
  			<div id="chat"></div>
  
  			</div>	
  			<form action="javascript:sendMsg()" method="post">
    			  <input type="text" name="txt" id="txt" class="form-control" placeholder="send...">
    			  <input type="submit"  value="send" class="btn btn-success btn-block">
	  		</form>


		</div>
	</div>
</div>
		
			<?php foreach ($room as $r):?>
  				<script type="text/javascript">
			setInterval(function(){listMsg()}, 500);
				function sendMsg(){
					 var txt = document.getElementById("txt").value;
					 if (txt == "") {}
					 else{
						$.ajax({
					      type : "POST",
					      url:"insert",
					      data:{txt:txt,user_id:<?=Yii::$app->user->id?>,hangout_id:<?=$r->id?>,fb:<?=Yii::$app->user->identity->fb_id?>},     
					      success : function (data){
					          //$("#chat").html(data);
					          $("#txt").val("");
					      }
					    });$("#txt").val("");
					}
				}
				function listMsg(){
				    $.ajax({
				    	type : "POST",
				    	url: "list", 
				    	data:{hangout_id:<?=$r->id?>},
				    	success: function(result){
				        	$("#chat").html(result);
				    	}
					});
				}
				
  				//return false;
				 </script>
				 <?php endforeach;?>