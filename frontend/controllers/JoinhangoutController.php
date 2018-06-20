<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Html;
use common\models\Joinhangout;
use frontend\models\JoinhangoutSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Hangout;
use common\models\Sport;
use common\models\Chat;

/**
 * JoinhangoutController implements the CRUD actions for Joinhangout model.
 */
class JoinhangoutController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Joinhangout models.
     * @return mixed
     */
    public function  actionInsert(){
       // var_dump($_POST);die();
 
       if ($_POST){
           $msg = $_POST['txt'];
           $user_id = $_POST['user_id'];
           $hangout_id = $_POST['hangout_id'];
           $fb = $_POST['fb'];
           $model = new Chat();
           $model->user_id = $user_id;
           $model->hangout_id = $hangout_id;
           $model->messen = $msg;
           $model->fb_id = $fb;
           $model->save();
       }
    }
    public function actionList(){
        $id = $_POST['hangout_id'];
        $model = Chat::find()->where(['hangout_id'=>$id])->all();
        foreach($model as $rs){
            //echo '<p>',Html::img('https://graph.facebook.com/'.$rs->fb_id.'/picture?type=large',['width'=>'10%']),'<span  style="color:blue;font-weight:bold" class="col-md-5">'.$rs->messen.'</span></p>';
            echo '<p>',Html::img('https://graph.facebook.com/'.$rs->fb_id.'/picture?type=large',['width'=>'10%']),'<span  style="color:blue;font-weight:bold" class="pull-right">'.$rs->messen.'</span></p>';
           // echo '<p>'.$rs->messen.'<span class="pull-right">',Html::img('https://graph.facebook.com/'.$rs->fb_id.'/picture?type=large',['width'=>'10%']);'</span></p><p>'.$rs->time.'<span class="pull-right">'.$rs->user->username.'</span></p>';
        }
    }
    
    public function actionIndex()
    {
        $searchModel = new JoinhangoutSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Joinhangout model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Joinhangout model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Joinhangout();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Joinhangout model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Joinhangout model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    
    //joinroom
    public function actionHome($id)
    {
        $this->layout= 'main2';
        $room = Hangout::find()->where(['id'=>$id])->all();
        $join = Joinhangout::find()->where(['hangout_id' => $id])->all();
        $model = new Joinhangout();
        
        $check_join = Joinhangout::findOne(['user_id'=>\Yii::$app->user->id,'hangout_id'=>$id]);
       
        //var_dump($room); die();
        if ($model->load(\Yii::$app->request->get())){
            
             $joinhangout = new Joinhangout();
             $joinhangout->user_id = \Yii::$app->user->id;
             //var_dump($model); die();
            $model->save();
        }
       // var_dump($model); die();
        return $this->render('join',[
            'room' => $room,
            'model' => $model,
            'join' => $join,
            'check_join' => $check_join
            
        ]);
    }
    public function  actionSavejoin($id){
        if (\Yii::$app->user->isGuest){
            return $this->redirect('../site/login');
        }
        $model = new Joinhangout();
        $model->hangout_id = $id;
       if( $model->user_id = \Yii::$app->user->id){
           $model->save();
       }else{ 
           //var_dump($model); die();
            
       }
        return   $this->redirect(['home','id' => $model->hangout_id]);
        
    }
    
    public function actionDeletejoin($id){
        
        $model = new Joinhangout();
        $model->user_id = $id;
        
        $delete = Joinhangout::find()->where(['user_id'=> $id])->one();
        $delete->delete();
        return $this->redirect('home?id='.$delete->hangout_id);
    }
    
   

    /**
     * Finds the Joinhangout model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Joinhangout the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Joinhangout::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
}
// {
//     if($chat->user_id == \Yii::$app->user->id){
//         echo '<p class="text-center">'.$chat->time.'</p>';
//         echo '<p>'.Html::img('https://graph.facebook.com/'.$chat->user->fb_id.'/picture?type=large',
//             ['width'=>'10%']),
//             '<span> '.$chat->messen.'</span></p>';
//     }
//     else{
//         echo '<p class="text-center">'.$chat->time.'</p>';
//         echo '<p class="text-right"> <span>'.$chat->messen.'</span>'
//             .Html::img('https://graph.facebook.com/'.$chat->fb_id.'/picture?type=large',
//                 ['width'=>'10%']).
//                 '</p>';
//     }
// }
?>