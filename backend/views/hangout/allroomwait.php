<?php 
use yii\helpers\Html;
?>
<div class="container">
	<div class="row">
	 <?php $id = $_GET['id']; ?>
		<a class="btn btn-primary" href="../hangout/allroom?id=<?=$id ?>">ห้องทั้งหมด</a>
		<a class="btn btn-success" href="../hangout/allroomshow?id=<?=$id ?>">ห้องที่แสดงอยู่</a>
		<a class="btn btn-warning" href="../hangout/allroomwait?id=<?=$id ?>">ห้องที่เล่นอยู่</a>
		<a class="btn btn-danger" href="../hangout/allroomhidden?id=<?=$id ?>">ห้องที่เล่นแล้ว</a>
		<div class="col-md-12">
		<br>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ชื่อห้อง</th>
						<th>สถานทีเล่นกีฬา</th>
						<th>เริ่มเวลา</th>
						<th>ถึงเวลา</th>
						<th>คนสร้าง</th>
						<th>สร้างเมื่อ</th>
						<th>แก้ไขเมื่อ</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($model as $m) :?>
					<tr>
						<td><?=$m->topic ?></td>
						<td><?=$m->sportcomplex ?></td>
						<td><?=Yii::$app->formatter->asDatetime($m->started_at); ?></td>
						<td><?=Yii::$app->formatter->asDatetime($m->finished_at); ?></td>
						<td><?=$m->createdby->username ?></td>
						<td><?=Yii::$app->formatter->asDatetime($m->created_at); ?></td>
						<td><?=Yii::$app->formatter->asDatetime($m->updated_at); ?></td>
						<td><?= Html::a('ลบ','../hangout/delete?id='.$m->id,['class'=>'btn btn-danger',
						    'data' =>  [
						              'confirm' => 'ยืนยัน',
						              'method' => 'post',
						],]); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>