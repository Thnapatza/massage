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
h5{
 color: white;
}

</style>
<div class="container">
        	<div class="row">
        	<h1>Profile </h1>
        	</div>
        	<div class="row">
       
        	<div class="col-md-3">
        	<?php if (!$model || $model=="" || $model==null){
        	
        	}else{?>
        		<?= Html::img('https://graph.facebook.com/'.$model->fb_id.'/picture?type=large',['width'=>'100%']);?>
        		<?= Html::a('Facebook','https://www.facebook.com/'.$model->fb_id.'',['class'=>'btn btn-primary']); ?>
        	<?php }?>
        	</div>
        		<div class="col-md-6">
        			<div class="panel panel-default shadow">
        			<div class="panel panel-body ">
        			ผู้ใช้ : <?=$model->username ?><br>
        			ชื่อจริง :  <?=$model->fname ?><br>
        			นามสกุล : <?=$model->lname ?><br>
        			อีเมลล์ :  <?=$model->email ?><br>
        			
        			
        			ระดับ : <?php // $data->power == User::POWER_3?Html::img('@web/images/user/Normal.png',['width'=>'20%']) : '' ?>
        				  <?php 
        		
        					if (!$point){
        					    echo Html::img('@web/images/user/powerg3.png',['width'=>'10%']);
        				
        					}else{
        					    if ($point->picture == 0){
        					        //echo "0";
        					        echo Html::img('/images/user/powerg1.png',['width'=>'10%']);
        					    }else if($point->picture == 1){ 
        					        //echo "1";
        					        echo Html::img('@web/images/user/powerg2.png',['width'=>'10%']);
            					
            					}else if($point->picture == 2){
            					    //echo "2";
            					    echo Html::img('@web/images/user/powerg3.png',['width'=>'10%']);
            					
                                }else if($point->picture == 3){
                                    echo Html::img('@web/images/user/powerg4.png',['width'=>'10%']);
                                    //echo "3";
                                
                                }else if($point->picture == 4){
                                    echo Html::img('@web/images/user/powerg5.png',['width'=>'10%']);
                                    //echo "4";
                                
                                }else {
                                    
                                }

        					}
        				?>
        			<br>
        			<?php if($model->id == Yii::$app->user->id){?>
        			<div class="pull-right">
        				<a class="btn btn-warning" href="update?id=<?= Yii::$app->user->id ?>">แก้ไข</a>
        			</div>
        			<?php }else{
        			
        			}?>
        				       
        			</div>
        			</div>
        			</div>
        			
        			
        	
        		
        		<div class="col-md-3"></div>
        	</div>
        	
        	
        <br>
        	<div class="col-md-12">
             				<div class="panel panel-default shadow">
             				<div class="panel-body">
                				<h4>ประวัติการเล่น</h4> 
                				<h1>
                				<a href="room-created?id=<?=$model->id?>" class="btn btn-warning">ห้องที่สร้าง</a>
                				<a href="join-created?id=<?=$model->id?>" class="btn btn-info">ห้องที่มีการเข้าร่วม</a>
                				</h1>
                				<div class="row">
                				
                				<?php foreach ($rooms_join as $r) : ?>
                				<?php // if(Yii::$app->user->id != $r->hangout->createdby_id || Yii::$app->user->id == $r->hangout->createdby_id){ ?>
                				<?php // if(Yii::$app->user->id == $r->hangout->createdby_id){ ?>
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
                        							<h5><?= $count+=1 ?>/<?= $r->hangout->maxjoin ?></h5>
                        						</div>
                        						<div class="panel-body">
                        							<p><span class="glyphicon glyphicon-book"></span> ชื่อห้อง : <?= $r->hangout->topic; ?></p>
                 			   					<p><span class="glyphicon glyphicon-time"></span> เริ่มเวลา : <?= Yii::$app->formatter->asDatetime($r->hangout->started_at) ?></p>
                             			   		<p><span class="glyphicon glyphicon-time"></span> ถึงเวลา : <?=Yii::$app->formatter->asDatetime($r->hangout->finished_at)?></p>
                             			   		<p><span class="glyphicon glyphicon-send"></span> สถานที่ : <?= $r->hangout->sportcomplex ?></p>
                 			   					<p><span class="glyphicon glyphicon-user"></span> คนสร้าง : <?= $r->hangout->createdby->username ?></p>
                 			   					<a class="btn btn-primary" href="../joinhangout/home?id=<?= $r->hangout_id ?>">ดูข้อมูล</a>
                 			   					<?php  if (Yii::$app->user->id == $r->hangout->createdby_id){ ?>
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
</div>