<?php

namespace frontend\controllers;

use Yii;
use common\models\Hangout;
use frontend\models\HangoutSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Sport;
use common\components\MyDate;
use common\models\Joinhangout;
use yii\bootstrap\Alert;
use yii\base\Widget;
use function Faker\Provider\pt_BR\check_digit;
use yii\helpers\VarDumper;
use frontend\models\SportSearch;
use common\models\Fulladdress;
use common\models\Chat;

/**
 * HangoutController implements the CRUD actions for Hangout model.
 */
class HangoutController extends Controller
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
     * Lists all Hangout models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HangoutSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionShow($id){
        $this->layout='main3';
       
        $model = Hangout::find()->where(['sport_id' => $id ])->all();
        $checktime = time();
        foreach ($model as $data){
            if ($data->started_at > $checktime){
                $data->status = Hangout::STATUS_SHOW;
                $data->save();
            }elseif ($data->started_at < $checktime && $data->finished_at > $checktime ) {
                $data->status = Hangout::STATUS_WAIT;
                $data->save();
            }else {
                $data->status = Hangout::STATUS_HIDDEN;
                $data->save();
            }
        }
        $model = Hangout::find()
                 ->where(['sport_id' => $id ])
                 ->andWhere(['or',
                     ['status' => Hangout::STATUS_SHOW ],
                     ['status' => Hangout::STATUS_WAIT]
                     
                 ])->all();
        return $this->render('show',[
            'model' => $model,
           // 'room' => $room,
            
        ]
            
            );
    }

    /**
     * Displays a single Hangout model.
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
     * Creates a new Hangout model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout ="main2";
        $model = new Hangout();
        $alert = 'non';
       
        if ($model->load(Yii::$app->request->post())) {
            
            if(\Yii::$app->user->isGuest){
                return $this->redirect('http://localhost/sport/frontend/web/index.php/site/login');
            }else{
                
                
                $checktime = time();
                //$checktime = \Yii::$app->formatter->asDatetime($checktime);
                //var_dump($checktime); die();
                
                
                
                $model->createdby_id = Yii::$app->user->id;
                $model->started_at = MyDate::Time2int($model->started_at);
                $model->finished_at = MyDate::Time2int($model->finished_at);
                 //var_dump($model->started_at); die();
                if ($model->started_at < $checktime){
                             $alert = 'active';
                             $model->started_at = \Yii::$app->formatter->asDatetime($model->started_at);
                             $model->finished_at = \Yii::$app->formatter->asDatetime($model->finished_at);
                             return $this->render('create',['model'=> $model,'alert'=>$alert]);
                        
                }elseif ($model->finished_at <= $model->started_at){
                    $alert = 'active';
                    $model->started_at = \Yii::$app->formatter->asDatetime($model->started_at);
                    $model->finished_at = \Yii::$app->formatter->asDatetime($model->finished_at);
                    return $this->render('create',['model'=> $model,'alert'=>$alert]);
                }else{
                    $alert = 'non';
                }
               // var_dump(\Yii::$app->formatter->asDatetime($checktime));
               // var_dump($checktime);die();
                
                //var_dump($model); die();
                $fulladdress = new Fulladdress();
                $fulladdress->location = $model->location;
                $fulladdress->lat = $model->lat;
                $fulladdress->lng = $model->lng;
                
                //if($fulladdress->save()){
                   // $model->save();
                    //return $this->redirect(['view', 'id' => $model->id]);
               // }
               // else{
                 //   throw new NotFoundHttpException('บันทึกไม่สำเร็จ');
                //}
                
                if($model->save()&&$fulladdress->save()){
                    return $this->redirect(['/joinhangout/home', 'id' => $model->id]);
                }else {
                     echo "failed"; die();
                      }
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'alert'=>$alert,
            ]);
        }
    }

    /**
     * Updates an existing Hangout model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $alert = 'non';
        $model = $this->findModel($id);
        $model->started_at = \Yii::$app->formatter->asDatetime($model->started_at);
        $model->finished_at = \Yii::$app->formatter->asDatetime($model->finished_at);
        
        if ($model->load(Yii::$app->request->post()) ) {
            $checktime = time();
            $checkfail_start = MyDate::Time2int($model->started_at);
            $checkfail_end = MyDate::Time2int($model->finished_at);
            if ($checkfail_start < $checktime){
                $alert = 'active';
              
                return $this->render('update',[ 'model' => $model,'alert'=>$alert]);
            }
            if ($checkfail_end <= $checkfail_start){
                $alert= 'active';
               
                return $this->render('update',['model'=>$model,'alert'=>$alert]);
            }else $alert = 'non';
            $model->started_at = MyDate::Time2int($model->started_at);
            $model->finished_at = MyDate::Time2int($model->finished_at);
            
           
            //var_dump($model->started_at);die();
            $model->save();
            
            return $this->redirect(['/joinhangout/home', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'alert'=>$alert,
            ]);
        }
    }

    /**
     * Deletes an existing Hangout model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    // delete chat
 
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        //var_dump($model);die();
        $chat_count = Chat::find()->where(['hangout_id'=>$id])->count();
        //var_dump($chat_count);die();
        if ($chat_count > 0){
            $chat = Chat::find()->where(['hangout_id'=>$id])->all();
            foreach ($chat as $delete_chat){
                $delete_chat->delete();
            }
        }else{
            
        }
        
        //
        $count_join_hangout = Joinhangout::find()->where(['hangout_id'=>$model->id])->count();
        if ($count_join_hangout>1){
            $join_hangout = Joinhangout::find()->where(['hangout_id'=>$model->id])->all();
            
            for ($i=0;$i<$count_join_hangout;$i++){
                $join_hangout[$i]->delete();
            }
               
        }else if($count_join_hangout<=0){
        }else{
            $join_hangout = Joinhangout::findOne(['hangout_id'=>$model->id]);
            $join_hangout->delete();
            
          }
        $model->delete();
        

        return $this->redirect(['sports']);
    }

    /**
     * Finds the Hangout model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hangout the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hangout::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    //home 
    public function actionHome(){
        $this->layout = 'main3';
        $type = Sport::find()->orderBy(['id' => SORT_ASC])->limit(8)->all();
        //$count = Hangout::find()->count('id')->all();
       // print_r($type); die();
        return $this->render('home',
        [
             'type' => $type,
             //'count' => $count,
        ]);
    }
    //allsports
    public function actionAllsports()
    {
        $this->layout = 'main3';
        $type = Sport::find()->orderBy(['id' => SORT_ASC])->all();
        return $this->render('allsports',[
            'type' => $type,
        ]);
    }
    
    //sports
    public function actionSports(){
        $this->layout = "main2";
        $type = Sport::find()->orderBy(['id'=>SORT_ASC])->limit(8)->all();
        
        return $this->render('sports',[
            'type' => $type,
        ]);
    }

}
?>