<?php

namespace frontend\controllers;



use common\models\Fulladdress;

class MapController extends \yii\web\Controller
{
    public $address;
    public $longitude;
    public $latitude;
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionMap(){
        $contacts = Fulladdress::find()->all();
        return $this->render('map',['contacts'=>$contacts]);
    }
    public function actionMapsreach()
    {
        return $this->render('mapsreach');
    }
}