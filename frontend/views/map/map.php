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
	<a class="glyphicon glyphicon-arrow-left" href="http://localhost/massage">ย้อนกลับ</a>
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="glyphicon glyphicon-signal"></i> การแสดงแผนที่ Google Map จากฐานข้อมูล </h3>
    </div>
    
    <div class="panel-body">
        <?php
        echo $map->display();
        ?>
    </div>
</div>