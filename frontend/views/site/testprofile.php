<?php 
use yii\helpers\Html;
use common\models\User;
use common\models\Joinhangout;
use common\models\Hangout;
?>

<style>
.shadow {
 box-shadow: 5px 5px 10px 10px rgba(50,50,50,.4);
}

</style>
<div class="container">
        	<div class="row">
        	<h1>Profile </h1>
        	</div>
        	<div class="row">
        	
        	<?php foreach ($model as $data) : ?>
        	<div class="col-md-3">
        		<?= Html::img('https://graph.facebook.com/'.$data->fb_id.'/picture?type=large',['width'=>'100%']);?>
        		<?= Html::a('Facebook','https://www.facebook.com/'.$data->fb_id.'',['class'=>'btn btn-primary']); ?>
        	</div>
        		<div class="col-md-6">
        			<div class="panel panel-default shadow">
        			<div class="panel panel-body ">
        			ผู้ใช้ : <?=$data->username ?><br>
        			ชื่อจริง :  <?=$data->fname ?><br>
        			นามสกุล : <?=$data->lname ?><br>
        			อีเมลล์ :  <?=$data->email ?><br>
        			
        			
        			ระดับ : <?php // $data->power == User::POWER_3?Html::img('@web/images/user/Normal.png',['width'=>'20%']) : '' ?>
        				   <?php if($data->power == User::POWER_1) {
        				       echo Html::img('@web/images/user/powerg1.png',['width'=>'10%']);
        				   }elseif ($data->power == User::POWER_2){
        				       echo Html::img('@web/images/user/powerg2.png',['width'=>'10%']);
        				   }elseif ($data->power == User::POWER_3){
        				       echo Html::img('@web/images/user/powerg3.png',['width'=>'10%']);
        				   }elseif ($data->power == User::POWER_4){
        				       echo Html::img('@web/images/user/powerg4.png',['width'=>'10%']);
        				   }else{
        				       echo Html::img('@web/images/user/powerg5.png',['width'=>'10%']);
        				   }
        				       
        				       
        				       ?>
        			<br>
        			<div class="pull-right">
        				<a class="btn btn-warning">แก้ไข</a>
        			</div>
        				       
        			</div>
        			</div>
        			</div>
        			
        			
        		<?php endforeach;?>
        		
        		<div class="col-md-3"></div>
        	</div>
        	
        	<div class="col-md-12">
             				<div class="panel panel-default shadow">
             				<div class="panel-body">
                				<h4>ประวัติการเล่น</h4> 
                				<div class="row">
                				
                				
                				
                				
                				<?php foreach ($room as $r) : ?>
     						
                				<?php $checktime = time();?>
                				
                				
                				
                				
                				
                					<div class="col-md-4">
                				 <?php if($r->hangout->started_at > $checktime){
                 				    $color ="panel panel-success"; 
                				 }elseif ($r->hangout->started_at < $checktime && $r->hangout->finished_at > $checktime){ 
               					$color ="panel panel-warning"; 
                				 }else {
                					$color ="panel panel-danger";
                				 }?>
                					<div class="<?=$color?>">
                						<?php // $user_created = Hangout::find()->where(['id' => $r->hangout->id])->count();?>
                						<?php $count = Joinhangout::find()->where(['hangout_id'=> $r->hangout->id])->count(); ?>
                        						<div class="panel-heading">
                        							<?php $count+=1 ?>/<?= $r->hangout->maxjoin ?>
                        						</div>
                        						<div class="panel-body">
                        							<p><span class="glyphicon glyphicon-book"></span> ชื่อห้อง : <?= $r->hangout->topic; ?></p>
                 			   					<p><span class="glyphicon glyphicon-time"></span> เริ่มเวลา : <?= Yii::$app->formatter->asDatetime($r->hangout->started_at) ?></p>
                             			   		<p><span class="glyphicon glyphicon-time"></span> ถึงเวลา : <?=Yii::$app->formatter->asDatetime($r->hangout->finished_at)?></p>
                             			   		<p><span class="glyphicon glyphicon-send"></span> สถานที่ : <?= $r->hangout->sportcomplex ?></p>
                 			   					<p><span class="glyphicon glyphicon-user"></span> คนสร้าง : <?= $r->hangout->createdby->username ?></p>
                 			   					<a class="btn btn-primary" href="../joinhangout/home?id=<?= $r->hangout_id ?>">ดูข้อมูล</a>
                 			   					<?php if (Yii::$app->user->id == $r->hangout->createdby_id){ ?>
                 			   						<?php if($r->hangout->finished_at < $checktime){?>
                											<button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?=$r->hangout_id ?>">ให้คะแนน</button>
                										<?php } ?>
                									<?php }?>
                        						</div>
                        						
                						</div>
                					
                					</div>
                					<?php endforeach;?>
                					
                				  
                				</div>
        						</div>
		</div>
</div>