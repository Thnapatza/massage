<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use frontend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Joinhangout;
use common\models\Hangout;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use common\models\Garantee;
use common\models\Point;
use yii\helpers\VarDumper;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function  actionGarantee(){
       
        //var_dump($_GET); die();
        $hangout_id = $_GET['hangout_id'];
        $user_created = \Yii::$app->user->id;
        $data = $_GET['user_joins'];
        $garantee = new Garantee();
        $garantee->user_id = $user_created;
        $garantee->hangout_id = $hangout_id;
        $garantee->save();
        //var_dump($garantee); die();
       if ($_GET){
           foreach ($data as $u){
//                $model = new Garantee();
//                $join_hangout_id = Joinhangout::findOne(['user_id'=>$u,'hangout_id'=>$hangout_id]);
              
//                 // find ได้ $join_hangout_id->id;
//                 //$model->joinhangout_id = $join_hangout_id->id;
//                 $model->hangout_id = $hangout_id; 
//                 $model->user_id = $u;
                $point = Point::findOne(['user_id'=>$u]);
                
                if (!$point){
                    $newpoint = new Point();
                    $newpoint->user_id = $u;
                    $newpoint->point =201;
                    $newpoint->picture = 2;
                    $newpoint->save();
                }else {
                    $point->point +=10;
                    // check point
                    if ($point->point<-1 && $point->point>=0){
                        $point->picture = 0;

                    }
                    else if ($point->point >= 100 && $point->point <200){
                        $point->picture = 1;
       
                    }else if ($point->point >= 200 && $point->point <300){
                        $point->picture = 2;
                
                    }else if ($point->point >= 300 && $point->point <400){
                        $point->picture = 3;
            
                    }else{
                        $point->picture = 4;
           
                    }
                    
                    $point->save();
                }
              //  $model->save();
           }
//            $model = new Garantee();
           
//            $model->hangout_id = $hangout_id;
//            $model->user_id = $user_created;
//            $model->save();
           
           return $this->redirect('room-created?id='.$user_created);
       }else{
           $point = Point::findOne(['user_id'=>$user_created]);
           if (!$point){
               $point = Point::findOne(['user_id'=>$u]);
               if (!$point){
                   $newpoint = new Point();
                   $newpoint->user_id = $u;
                   $newpoint->point = 201;
                   $newpoint->picture = 2;
                   $newpoint->save();
               }else {
                   $point->point +=10;
                   // check point
                   if ($point->point<-1 && $point->point>=0){
                       $point->picture = 0;
                   }
                   else if ($point->point >= 100){
                       $point->picture = 1;
                   }else if ($point->point >= 200){
                       $point->picture = 2;
                   }else if ($point->point >= 300){
                       $point->picture = 3;
                   }else{
                       $point->picture = 4;
                   }
                   
                   $point->save();
               }
               
           }
       }
       
        
    }
    
    //profile
    public function actionProfile($id)
    {
        
        $this->layout = 'main';
      
        $model = User::findOne($id);
       
        $room = Joinhangout::find()->where(['user_id' => $id])->all();
        $point  = Point::findOne(['user_id'=>$model->id]);
        //var_dump($imgprofile);die();
        $user_created = Hangout::find()->where(['createdby_id'=> $id])->all();
        
        return $this->render('profile',[
            'model' => $model,
            'room' => $room,
            'point' => $point,
            'user_created' => $user_created,
            
        ]);
    }
    
    public function actionRoomCreated($id){
        $model = User::findOne($id);
        $point  = Point::findOne(['user_id'=>$model->id]);
        $rooms_created = Hangout::find()->where(['createdby_id'=> $id])->all();
        return $this->render('room-created',
            [
                'model' => $model,
                'rooms_created' => $rooms_created,
                'point' => $point,
            ]);
    }
    public function actionJoinCreated($id){
        $model = User::findOne($id);
        $point  = Point::findOne(['user_id'=>$model->id]);
        $rooms_join = Joinhangout::find()->where(['user_id' => $id])->all();
        return $this->render('join-created',
            [
            'model' => $model,
            'rooms_join' => $rooms_join,
            'point' => $point,
        ]);
    }
    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['profile', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
