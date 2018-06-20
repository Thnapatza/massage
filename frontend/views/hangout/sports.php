<?php 
use yii\helpers\Html;
use common\models\Hangout;
?>
<style>
    .panel-border{
        border-radius: 8px;
    }
    .panel-white{
        background: white;
        color: black;
        border-radius: 8px;
    }
    .panel-org{
        background: #ff9900;
        color: white;
        border-radius: 8px;
    }
    .panel-center{
        background: #ff9900;
        color: white;
        border-radius: 8px;
        text-align: center;
        height :260px;
    }
    .panel-custom{
        background: #333333;
        color: white;
    }
    
    .text{
        color: white;
    }
    .font{
        font-size: 70px;
    }
    
    
   
</style>

<div class="container">
	<div class="row">
	<div class="col-md-0"></div>
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading panel-custom"><h4>ประเภทการนวด</h4></div>
				<div class="panel-body">
					<div class="row">
					
						<?php $n=1; foreach  ($type as $t) : ?>
        					<div class="col-md-4">
        						<div class="panel panel-default panel-border">
        							<div class="panel-body panel-org">
        								<div class="col-md-8">
        								<?= Html::img('@web/images/'.$n.'.png',['width'=>'70%']) ?>
        								</div>
        								<?php $count = Hangout::find()
        								->where(['sport_id'=> $t->id]) 
        								->andWhere(['or',
        								    ['status'=>Hangout::STATUS_SHOW],
        								    ['status'=>Hangout::STATUS_WAIT]
        								    ])->count();
        								?>
        								<div class="col-md-4"><br><h1 class="font"><?=$count ?></h1></div>
        							</div>
        							<div class="panel-footer panel-white">
        								<div class="row">
        									<div class="col-md-7">
        										<h4><?=$t->name?></h4>
        									</div>
        									<div class="col-md-5">
        										<div class="pull-right">
        											<a class="btn btn-success" href="../hangout/show?id=<?=$t->id ?>">ดูรายละเอียด</a>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
        					</div>
        					<?php $n+=1; endforeach;?>
        					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>