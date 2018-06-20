<?php

namespace backend\controllers;

use Yii;
use common\models\Hangout;
use backend\models\HangoutSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Sport;
use backend\models\SportSearch;
use common\models\Joinhangout;

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
        $dataProvider->pagination->pageSize=10;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
        $model = new Hangout();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
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
     * Deletes an existing Hangout model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
      
        $id = $_GET['id'];
        $type = $_GET['type'];
        $model = $this->findModel($id);
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
        
        return $this->redirect('test2?id='.$type);
    }
    
    public function actionViewadmin()
    {
        $searchModel = new SportSearch();
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         $dataProvider->pagination->pageSize=10;
        $type = Sport::find()->orderBy(['id'=> SORT_ASC])->all();
        return $this->render('viewadmin',[
            'type' => $type,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    //allroom
    public function actionAllroom($id)
    {
      //  $this->layout = "main";
        $searchModel = new HangoutSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       // $dataProvider->pagination->pageSize=10;
        $model = Hangout::find()->where(['sport_id'=>$id])->all();
        return $this->render('allroom',[
             'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    //allroomshow
    public function actionAllroomshow($id)
    {
        $this->layout = "main";
        $model = Hangout::find()->where(['sport_id' => $id,'status'=>Hangout::STATUS_SHOW])->all();
        return $this->render('allroomshow',[
            'model' => $model,
        ]);
    }
    
    //allroomhidden
    public function actionAllroomhidden($id)
    {
        $this->layout = "main";
        $model = Hangout::find()->where(['sport_id' => $id,'status'=>Hangout::STATUS_HIDDEN])->all();
        return $this->render('allroomhidden',[
            'model' => $model,
        ]);
    }
    
    //allroomwait
    public function actionAllroomwait($id)
    {
        $this->layout = "main";
        $model = Hangout::find()->where(['sport_id' => $id,'status'=>Hangout::STATUS_WAIT])->all();
        return $this->render('allroomwait',[
            'model' => $model,
        ]);
    }
    
    //test datatable
    public function actionTest()
    {
        $this->layout = "main";
        $searchModel = new SportSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->post());
        $dataProvider->pagination->pageSize=10;
        $model = Sport::find()->orderBy(['id'=> SORT_ASC])->all();
        return $this->render('test',[
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionTest2($id)
    {
        
//         echo '<pre>';
//         print_r(\Yii::$app->request->queryParams);
//         echo '</pre>';
//         die('stop');
        $this->layout = "main";
        $searchModel = new HangoutSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
//         echo '<pre>';
//         print_r($dataProvider);
//         echo '</pre>';
//         die('stop');
        $dataProvider->pagination->pageSize=10;
        $model = Hangout::find()->where(['sport_id'=>$id])->all();
//         echo '<pre>';
//         print_r($model);
//         echo '</pre>';
//         die('stop');
        return $this->render('test2',[
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionAllroom2($id){
        $this->layout="main";
        $searchModel = new HangoutSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;
        $model = Hangout::find()->where(['sport_id'=>$id])->all();
        return $this->render('allroom2',[
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
}
