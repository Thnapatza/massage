<?php 
use yii\helpers\Html;
use yii\web\View;
$this->title="Massage of Service";
$this->registerJs("
 $(window).on('load',function(){
        $('#myModal').modal('show');
    });
",View::POS_READY);
?>

<style>
    .layout{
        margin: auto;
    }
</style>

<div class="container">
	<div class="row">
		   <center>		
	<a class="btn btn-info" href="http://localhost/massage/map/map">สถานที่นวด</a>
           </center>
   <h1 class="text-center"><a style="color:white;" class="button button1 btn-lg " href="http://localhost/massage/hangout/show?id=<?=1 ?>"><span class="	glyphicon glyphicon-search"></span> นวดหัว  </a>
   <a style="color:white;" class="button button1 btn-lg " href="http://localhost/massage/hangout/show?id=<?=2 ?>"><span class="	glyphicon glyphicon-search"></span> นวดตัว นวดหลัง  </a>
   <a style="color:white;" class="button button1 btn-lg " href="http://localhost/massage/hangout/show?id=<?=3 ?>"><span class="	glyphicon glyphicon-search"></span> นวดแขน นวดฝ่ามือ  </a>
   <a style="color:white;" class="button button1 btn-lg " href="http://localhost/massage/hangout/show?id=<?=4 ?>"><span class="	glyphicon glyphicon-search"></span> นวดขา นวดฝ่าเท้า  </a>
   <a style="color:white;" class="button button1 btn-lg " href="http://localhost/massage/hangout/sports"><span class="	glyphicon glyphicon-search"></span> ดูทั้งหมด </a>
  </h1>	
  
				<div class="panel-body">
				<h3 class="text-center" style="color:orange;">ข่าวความรู้เกี่ยวกับสุขภาพ</h3>
	
					<div class="row">
						
        					<div class="col-md-4">
        						
        							<div class="panel-body panel-org">
        								<div class="col-md-12" >
        								<a href="https://www.samunpri.com/news/%E2%80%9C%E0%B9%80%E0%B8%AB%E0%B9%87%E0%B8%94%E2%80%9D-%E0%B8%84%E0%B8%B8%E0%B8%93%E0%B8%84%E0%B9%88%E0%B8%B2%E0%B9%82%E0%B8%A0%E0%B8%8A%E0%B8%99%E0%B8%B2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B9%E0%B8%87-%E0%B8%81%E0%B8%A3%E0%B8%A1%E0%B8%AD%E0%B8%99%E0%B8%B2%E0%B8%A1%E0%B8%B1%E0%B8%A2%E0%B8%8A%E0%B8%B5%E0%B9%89%E0%B9%80%E0%B8%A5%E0%B8%B5%E0%B9%88%E0%B8%A2%E0%B8%87%E0%B8%81%E0%B8%B4%E0%B8%99%E0%B9%80%E0%B8%AB%E0%B9%87%E0%B8%94%E0%B9%81%E0%B8%9B%E0%B8%A5%E0%B8%81/"><?= Html::img('@web/images/massage/1.jpg',['width'=>'100%']) ?></a>
        									<a href="https://www.samunpri.com/news/%E2%80%9C%E0%B9%80%E0%B8%AB%E0%B9%87%E0%B8%94%E2%80%9D-%E0%B8%84%E0%B8%B8%E0%B8%93%E0%B8%84%E0%B9%88%E0%B8%B2%E0%B9%82%E0%B8%A0%E0%B8%8A%E0%B8%99%E0%B8%B2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B9%E0%B8%87-%E0%B8%81%E0%B8%A3%E0%B8%A1%E0%B8%AD%E0%B8%99%E0%B8%B2%E0%B8%A1%E0%B8%B1%E0%B8%A2%E0%B8%8A%E0%B8%B5%E0%B9%89%E0%B9%80%E0%B8%A5%E0%B8%B5%E0%B9%88%E0%B8%A2%E0%B8%87%E0%B8%81%E0%B8%B4%E0%B8%99%E0%B9%80%E0%B8%AB%E0%B9%87%E0%B8%94%E0%B9%81%E0%B8%9B%E0%B8%A5%E0%B8%81/">	<h4 style="color:white;" >“เห็ด” คุณค่าโภชนาการสูง กรมอนามัยชี้เลี่ยงกินเห็ดแปลก</h4></a>
        								</div>
        							</div>
					</div>
						<div class="row">
						
        					<div class="col-md-4">
        						
        							<div class="panel-body panel-org">
        								<div class="col-md-12" >
        								<a href="https://www.samunpri.com/news/%E0%B8%A3%E0%B8%A7%E0%B8%A1-4-%E0%B8%AA%E0%B8%B9%E0%B8%95%E0%B8%A3%E0%B9%80%E0%B8%94%E0%B9%87%E0%B8%94-%E0%B8%9E%E0%B8%AD%E0%B8%81%E0%B8%AA%E0%B8%A1%E0%B8%B8%E0%B8%99%E0%B9%84%E0%B8%9E%E0%B8%A3-%E0%B8%A3%E0%B8%B1%E0%B8%81%E0%B8%A9%E0%B8%B2%E0%B8%AD%E0%B8%B2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%9B%E0%B8%A7%E0%B8%94%E0%B9%80%E0%B8%82%E0%B9%88%E0%B8%B2/"><?= Html::img('@web/images/massage/2.jpeg',['width'=>'98%']) ?></a>
        										<a href="https://www.samunpri.com/news/%E0%B8%A3%E0%B8%A7%E0%B8%A1-4-%E0%B8%AA%E0%B8%B9%E0%B8%95%E0%B8%A3%E0%B9%80%E0%B8%94%E0%B9%87%E0%B8%94-%E0%B8%9E%E0%B8%AD%E0%B8%81%E0%B8%AA%E0%B8%A1%E0%B8%B8%E0%B8%99%E0%B9%84%E0%B8%9E%E0%B8%A3-%E0%B8%A3%E0%B8%B1%E0%B8%81%E0%B8%A9%E0%B8%B2%E0%B8%AD%E0%B8%B2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%9B%E0%B8%A7%E0%B8%94%E0%B9%80%E0%B8%82%E0%B9%88%E0%B8%B2/"><h4 style="color:white;">รวม 4 สูตรเด็ด “พอกสมุนไพร” รักษาอาการปวดเข่า</h4></a>
        								</div>
        							</div>
					</div>
						<div class="row">
						
        					<div class="col-md-4">
        						
        							<div class="panel-body panel-org">
        								<div class="col-md-12" >
        								<a href="https://www.samunpri.com/news/%E0%B8%9A%E0%B8%B1%E0%B8%A7%E0%B8%9A%E0%B8%81-%E0%B8%9A%E0%B8%B3%E0%B8%A3%E0%B8%B8%E0%B8%87%E0%B8%AA%E0%B8%A1%E0%B8%AD%E0%B8%87-%E0%B8%9B%E0%B9%89%E0%B8%AD%E0%B8%87%E0%B8%81%E0%B8%B1%E0%B8%99%E0%B8%AD%E0%B8%B1%E0%B8%A5%E0%B9%84%E0%B8%8B%E0%B9%80%E0%B8%A1%E0%B8%AD%E0%B8%A3%E0%B9%8C-%E0%B8%9F%E0%B8%B7%E0%B9%89%E0%B8%99%E0%B8%9F%E0%B8%B9%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%88%E0%B8%B3/"><?= Html::img('@web/images/massage/3.jpg',['width'=>'107%']) ?></a>
        										<a href="https://www.samunpri.com/news/%E0%B8%9A%E0%B8%B1%E0%B8%A7%E0%B8%9A%E0%B8%81-%E0%B8%9A%E0%B8%B3%E0%B8%A3%E0%B8%B8%E0%B8%87%E0%B8%AA%E0%B8%A1%E0%B8%AD%E0%B8%87-%E0%B8%9B%E0%B9%89%E0%B8%AD%E0%B8%87%E0%B8%81%E0%B8%B1%E0%B8%99%E0%B8%AD%E0%B8%B1%E0%B8%A5%E0%B9%84%E0%B8%8B%E0%B9%80%E0%B8%A1%E0%B8%AD%E0%B8%A3%E0%B9%8C-%E0%B8%9F%E0%B8%B7%E0%B9%89%E0%B8%99%E0%B8%9F%E0%B8%B9%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%88%E0%B8%B3/"><h4 style="color:white;">“บัวบก” บำรุงสมอง ป้องกันอัลไซเมอร์ ฟื้นฟูความจำ</h4></a>
        								</div>
        							</div>
					</div>
				</div>
				</div>
			</div>
	
		</div>

    <div id="myModal" class="modal fade" role="dialog"  >
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="jumbotron">
        	 <img alt="" src="/massage/images/massage/11.png" style="width:60%">
                <h1>Welcome</h1>
                  <p class="lead">Massage web applications.</p>
                <p class="lead">เว็บไซต์สำหรับท่านที่ชื่นชอบการนวดและการผ่อนคลาย</p><hr>
            </div>
      <?php

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;

$coord = new LatLng(['lat'=>13.777234,'lng'=>100.561981]);
$map = new Map([
    'center'=>$coord,
    'zoom'=>6,
    'width'=>'100%',
    'height'=>'600',
]);
foreach($contacts as $c){
  $coords = new LatLng(['lat'=>$c->lat,'lng'=>$c->lng]);  
  $marker = new Marker(['position'=>$coords]);
  $marker->attachInfoWindow(
    new InfoWindow([
        'content'=>'
     
            <h4>ที่อยู่</h4>
              <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td>ที่อยู่</td>
                    <td>'.$c->location.'</td>
                </tr>
                <tr>
                    <td>ค่าแลตติจูด</td>
                    <td>'.$c->lat.'</td>
                </tr>
                <tr>
                    <td>ลองติจูด</td>
                    <td>'.$c->lng.'</td>
                </tr>
                <th><a class="btn btn-info" href="../map/mapsreach?lat='.$c->lat.'&lng='.$c->lng.'">นำเส้นทาง</a></th>
        '
    ])
  );
 
  $map->addOverlay($marker);
}
?>
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="glyphicon glyphicon-signal"></i> สถานที่ที่ให้บริการนวด</h3>
    </div>
    <div class="panel-body">
        <?php
        echo $map->display();
        ?>
    </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>

  </div>
</div>
		
	

