<?php 
use yii\helpers\Html;
use common\models\Hangout;

$this->title = "SportMeeting";

?>
<style>
<!--
 .center{
     text-align: center;
     
 }
-->
</style>
<div class="container">
	<div class="row">
	
	<?php $n=1; foreach ($type as $t):?>
	
		<div class="col-md-4">
			<div class="thumbnail" style="opacity: 0.9">
<!-- 				<img src="../../images/logo/soccer.png" alt="football" width="30%"> -->
				<?= Html::img('@web/images/logo/'.$n.'.png',['width'=>'30%']) ?>
				<div class="caption">
					<h3><?=$t->name?></h3>
					<div class="row">
					<?php  $count = Hangout::find()->where(['sport_id' => $t->id,'status' => Hangout::STATUS_SHOW])->count()?>
						<div class="col-md-8"><h4><span class="label label-primary"><?=$count?> ห้อง</span></h4></div>
						<div class="col-md-4">
						<?php //Html::a('เข้าร่วม','../hangout/show?id='.$t->id,['class'=>'btn btn-success'])?>
						<a class="btn btn-success" href="../hangout/show?id=<?= $t->id ?>"><span class="glyphicon glyphicon-log-in"></span> เข้าร่วม</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php $n+=1; endforeach;?>
		
		<div class="col-md-4">
			<div class="thumbnail" style="opacity: 0.9">
				<div class="caption">
					<br><br><br><br><br>
<!-- 					<div class="col-md-3"></div> -->
					<div class="center">
					
					<h3><a href="../hangout/allsports">All Sports</a></h3>
					
					</div>
<!-- 					<div class="col-md-3"></div> -->
					<br><br><br><br>
				</div>
			</div>
		</div>
	</div>
</div>
