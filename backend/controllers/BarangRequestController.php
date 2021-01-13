<?php

namespace backend\controllers;

use Yii;
use common\models\BarangRequest;
use common\models\BarangRequestDetail;
use common\models\BarangRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BarangRequestController implements the CRUD actions for BarangRequest model.
 */
class BarangRequestController extends Controller
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
     * Lists all BarangRequest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BarangRequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BarangRequest model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
	public function actionDeleteDetail($id){
		$model = BarangRequestDetail::findOne($id);
		$model->delete();
		return $this->redirect(Yii::$app->request->referrer);
	}
	public function actionMinDetail($id){
		$model = BarangRequestDetail::findOne($id);
		$model->Qty = $model->Qty - 1;
		$model->save();
		return $this->redirect(Yii::$app->request->referrer);
	}
	public function actionPlusDetail($id){
		$model = BarangRequestDetail::findOne($id);
		$model->Qty = $model->Qty + 1;
		$model->save();
		return $this->redirect(Yii::$app->request->referrer);
	}
	public function actionSelesai($id){
		$model = $this->findModel($id);
		$model->Status = 2;
		$model->save();
		\Yii::$app->getSession()->setFlash('success', 'Permintaan Barang Terkirim');
		return $this->redirect(['index']);
		
	}
    public function actionView($id)
    {
		$model = $this->findModel($id);
		$detail = new BarangRequestDetail();
		if ($detail->load(Yii::$app->request->post())) {
			if($detail->Qty < 1){
				\Yii::$app->getSession()->setFlash('danger', 'Gagal Qty Kurang dari NOL !!');
				return $this->refresh();
			}
			$cari = BarangRequestDetail::find()->where(['KodeBarang'=>$detail->KodeBarang])->andWhere(['KodeRequest'=>$model->KodeRequest])->one();
			$caric = BarangRequestDetail::find()->where(['KodeBarang'=>$detail->KodeBarang])->andWhere(['KodeRequest'=>$model->KodeRequest])->count();
			if($caric > 0){
				$cari->Qty = $cari->Qty + $detail->Qty;
				$cari->save();
				return $this->redirect(['view', 'id' => $model->Id]);
			}else{
				$detail->KodeRequest = $model->KodeRequest;
				if($detail->save()){
					return $this->redirect(['view', 'id' => $model->Id]);
				}else{
					return $this->render('view', [
						'model' => $model,
						'detail' => $detail,
					]);
				}
			}
		}
        return $this->render('view', [
            'model' => $model,
            'detail' => $detail,
        ]);
    }

    /**
     * Creates a new BarangRequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BarangRequest();

        if ($model->load(Yii::$app->request->post())) {
			$model->genKode();
			$model->IdUser = Yii::$app->user->identity->id ;
			$model->Status = 1 ;
			$model->TglRequest = date('Y-m-d H:i:s');
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->Id]);
			}else{
				return $this->render('create', [
					'model' => $model,
				]);
			}
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BarangRequest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BarangRequest model.
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
     * Finds the BarangRequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BarangRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BarangRequest::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
