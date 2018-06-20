<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Sport;
use yii\bootstrap\Modal;
use kartik\datetime\DateTimePicker;
use yii\base\Widget;
use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model common\models\Hangout */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .text{
        color: white;
    }
</style>

<div class="container">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="panel panel-info">
			<div class="panel-heading"><h3>ข้อมูลห้อง</h3></div>
			<div class="panel-body">
			<?php if ($alert == 'active'){?>
                <?= \yii\bootstrap\Alert::widget([
                    'options' => [
                        'class' => 'alert-danger',
                    ],
                    'body' => 'กรอกเวลาไม่ถูกต้อง',
                ]);}else?>
                
                
				<div class="col-md-6">
					<div class="panel panel-default">
 						 <div class="panel-body">
  							<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlMCXTr74f7ah640MrjFbb3V4KUHhqRis&language=th&libraries=places"></script>
</head>
<body>


 <input id="searchInput" class="input-controls" type="text" placeholder="Enter a location">
 <div class="map" id="map" style="width: 100%; height: 300px;"></div>
 <div class="form_area">
<!--      <input type="text" name="location" id="location">  -->
<!--      <input type="text" name="lat" id="lat"> -->
<!--      <input type="text" name="lng" id="lng"> -->
 </div>
<script>
/* script */
function initialize() {
   var latlng = new google.maps.LatLng(19.027715,99.900564);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 15
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true,
      anchorPoint: new google.maps.Point(0, -29)
   });
    
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();   
    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
       
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);          
    
        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);
       
    });
    // this function will work on marker move event into map 
    	google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {        
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
          }
        }
        });
    });
}
function bindDataToForm(address,lat,lng){
   document.getElementById('hangout-location').value = address;
   document.getElementById('hangout-lat').value = lat;
   document.getElementById('hangout-lng').value = lng;
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>



<style type="text/css">
    .input-controls {
      margin-top: 10px;
      border: 1px solid transparent;
      border-radius: 2px 0 0 2px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      height: 32px;
      outline: none;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }
    #searchInput {
      background-color: #fff;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
      margin-left: 12px;
      padding: 0 11px 0 13px;
      text-overflow: ellipsis;
      width: 50%;
    }
    #searchInput:focus {
      border-color: #4d90fe;
    }
</style>
  						 </div>
					</div>	
					<center>		
	<a class="btn btn-info" href="http://localhost/sport/map/map">สถานที่แนะนำ</a>
                </center>
                <?php $form = ActiveForm::begin(); ?>
           		 <?= $form->field($model, 'location')->hiddenInput()->label(false); ?>
   				 <?= $form->field($model, 'lat')->hiddenInput()->label(false);?>
     			 <?= $form->field($model, 'lng')->hiddenInput()->label(false);?>
                <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>
                
                <?= $form->field($model, 'sport_id')->dropDownList(
                        ArrayHelper::map(Sport::find()->all() ,'id', 'name')
                    ) ?>
                 
            
               
            
                <?php // $form->field($model, 'created_at')->textInput() ?>
            
                <?php // $form->field($model, 'updated_at')->textInput() ?>
            
                
            </div>
            <div class="col-md-6">
               
            
                <?php // $form->field($model, 'started_at')->textInput() ?>
                <?= $form->field($model, 'started_at')->widget(DateTimePicker::classname(), 
                 [
                        'name' => 'started_at',
                        'options' => ['placeholder' => 'Select operating time ...'],
                        'convertFormat' => true,
                        'pluginOptions' => [
                            'format' => 'dd-M-yyyy H:i ',
                            'todayHighlight' => true
                        ]]
            ); ?>
            
            
            
                <?php //$form->field($model, 'finished_at')->textInput() ?>
                <?= $form->field($model, 'finished_at')->widget(DateTimePicker::classname(), 
                 [
                        'name' => 'finished_at',
                        'options' => ['placeholder' => 'Select operating time ...'],
                        'convertFormat' => true,
                        'pluginOptions' => [
                            'format' => 'dd-M-yyyy H:i ',
                            'todayHighlight' => true
                        ]]
            ); ?>
            
             <?= $form->field($model, 'sportcomplex')->textInput(['maxlength' => true]) ?>
            
               
            
                <?php // $form->field($model, 'createdby_id')->textInput() ?>
            
                <?= $form->field($model, 'maxjoin')->textInput() ?>
                 <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                </div>
            
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            
                <?php ActiveForm::end(); ?>
                
                </div>
    
   		</div>
    </div>

</div>
