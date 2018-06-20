<?php 
use yii\helpers\Html;

$this->title = "SportMeeting";
?>
<div class="container">
	<div class="row">
	
	<?php for($count= 0; $count<7 ; $count++):?>
		<div class="col-md-4">
			<div class="thumbnail" style="opacity: 0.9">
<!-- 				<img src="../../images/logo/soccer.png" alt="football" width="30%"> -->
				<?= Html::img('@web/images/logo/soccer.png',['width'=>'30%']) ?>
				<div class="caption">
					<h3>ฟุตบอล</h3>
					<div class="row">
						<div class="col-md-9"><h4><span class="label label-primary">ห้องทั้งหมด</span></h4></div>
						<div class="col-md-3">
						<?= Html::a('เข้าร่วม','../hangout/show?id=1',['class'=>'btn btn-success'])?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endfor;?>
		
		

	</div>
</div>
