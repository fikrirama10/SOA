<?php

namespace backend\controllers;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\UserDetail;
use common\models\UserDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserDetailController implements the CRUD actions for UserDetail model.
 */
class UserDetailController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all UserDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserDetail model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserDetail();
		$user = new User();

        if ($model->load(Yii::$app->request->post()) 
			&& $user->load(Yii::$app->request->post())
			&& Model::validateMultiple([$user])) {	
						
			$model->genIdM();
		
			$user->IdM=$model->IdM;
			$user->setPassword($user->Password);
            $user->generateAuthKey();
					
			if($model->save(false)){
			   $user->save(false);
				 return $this->redirect(['index']);
			}
			else
			{
				
				return $this->render('create', ['model' => $model,'user' => $user,]);
			 }
		
        } else {
			return $this->render('create', ['model' => $model,'user' => $user,]);
        
		}
    }

   public function actionUpdate($id)
    {
       
	   $model = $this->findModel($id);
	   $user = User::find()->where(['IdM' => $model->IdM])->one();
		
        if ($model->load(Yii::$app->request->post()) 
			&& $user->load(Yii::$app->request->post())
			&& Model::validateMultiple([$user])) {
					
			$model->genIdM();
			$user->IdM=$model->IdM;
			$user->setPassword($user->Password);
            $user->generateAuthKey();
						
			if($model->save(false)){
			   $user->save(false);
				 return $this->redirect(['index']);
			}
			else
			{
				
				return $this->render('update', ['model' => $model,'user' => $user,]);
			 }
			
			
			
           
        } else {
			return $this->render('update', ['model' => $model,'user' => $user,]);
        
		}
    }

    /**
     * Updates an existing UserDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
   

    /**
     * Deletes an existing UserDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserDetail::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
