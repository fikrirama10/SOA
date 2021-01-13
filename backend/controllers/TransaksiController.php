<?php

namespace backend\controllers;

use Yii;
use common\models\Barang;
use common\models\Transaksi;
use common\models\BarangMutasi;
use common\models\TransaksiDetail;
use common\models\TransaksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransaksiController implements the CRUD actions for Transaksi model.
 */
class TransaksiController extends Controller
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
     * Lists all Transaksi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransaksiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transaksi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
		$model = $this->findModel($id);
		$barang = new TransaksiDetail();
		$mutasi = new BarangMutasi();
		if ($barang->load(Yii::$app->request->post())) {
			$dataBarang = Barang::find()->where(['KodeBarang'=>$barang->KodeBarang])->one();
			if($dataBarang->StokBarang < $barang->Qty){
				\Yii::$app->getSession()->setFlash('danger', 'Stok Barang Kurang');
				return $this->refresh();
			}
			$transaksi = TransaksiDetail::find()->where(['KodeTrx'=>$model->KodeTrx])->andWhere(['KodeBarang'=>$barang->KodeBarang])->one();
			$tc = TransaksiDetail::find()->where(['KodeTrx'=>$model->KodeTrx])->andWhere(['KodeBarang'=>$barang->KodeBarang])->count();
			if($tc > 0){
				$dataBarang = Barang::find()->where(['KodeBarang'=>$barang->KodeBarang])->one();
				$transaksi->Qty = $transaksi->Qty + $barang->Qty;
				$transaksi->SubTotal = $transaksi->SubTotal + ($transaksi->Harga * $barang->Qty);
				$mutasi->KodeBarang = $barang->KodeBarang;
				$mutasi->BarangKeluar = $barang->Qty;
				$mutasi->Qty = $barang->Qty;
				$mutasi->BarangMasuk = 0;
				$mutasi->JenisMutasi = 1;
				$mutasi->StokAwal = $dataBarang->StokBarang;			
				$mutasi->StokAkhir = $dataBarang->StokBarang - $barang->Qty;			
				$mutasi->TglMutasi = date('Y-m-d H:i:s');	
				$mutasi->IdUSer = Yii::$app->user->identity->id ;				
				$dataBarang->StokBarang = $dataBarang->StokBarang - $barang->Qty;
				if($mutasi->save()){
					$transaksi->save();
					$dataBarang->save();
					return $this->redirect(['view', 'id' => $model->Id]);
				}
			}else{
				$dataBarang = Barang::find()->where(['KodeBarang'=>$barang->KodeBarang])->one();
				$mutasi->KodeBarang = $barang->KodeBarang;
				$mutasi->BarangKeluar = $barang->Qty;
				$mutasi->Qty = $barang->Qty;
				$mutasi->BarangMasuk = 0;
				$mutasi->JenisMutasi = 1;
				$mutasi->StokAwal = $dataBarang->StokBarang;			
				$mutasi->StokAkhir = $dataBarang->StokBarang - $barang->Qty;			
				$mutasi->TglMutasi = date('Y-m-d H:i:s');			
				$mutasi->IdUSer = Yii::$app->user->identity->id ;
				$dataBarang->StokBarang = $dataBarang->StokBarang - $barang->Qty;
				$barang->SubTotal = $barang->barang->HargaBarang * $barang->Qty;
				$barang->KodeTrx = $model->KodeTrx;
				$barang->Harga = $barang->barang->HargaBarang;
				
				if($barang->save()){
					$mutasi->save();
					$dataBarang->save();
					return $this->redirect(['view', 'id' => $model->Id]);
				}else{
					return $this->render('view', [
						'model' => $model,
						'barang' => $barang,
					]);
				}
			}
			
		}
        return $this->render('view', [
            'model' => $model,
            'barang' => $barang,
        ]);
    }
	public function actionBayar($id){
		$model = $this->findModel($id);
		$transaksi = TransaksiDetail::find()->where(['KodeTrx'=>$model->KodeTrx])->all();
		$total = 0;
		if ($model->load(Yii::$app->request->post())) {
			foreach($transaksi as $tr){
				$total += $tr->SubTotal;
			}
			$model->SubTotal = $total;
			$model->Status = 2;
			if($model->save(false)){
				\Yii::$app->getSession()->setFlash('success', 'Transaksi Selesai');
				return $this->redirect(['index']);
			}
		}
		return $this->render('bayar',[
			'model'=>$model,
			'transaksi'=>$transaksi,
		]);
	}
	public function actionBatal($id){
		$model = TransaksiDetail::findOne($id);
		$barang = Barang::find()->where(['KodeBarang'=>$model->KodeBarang])->one();
		$mutasi = new BarangMutasi();
		$mutasi->KodeBarang = $model->KodeBarang;
		$mutasi->Qty = $model->Qty;
		$mutasi->BarangMasuk = $model->Qty;
		$mutasi->BarangKeluar = 0;
		$mutasi->JenisMutasi = 5;
		$mutasi->IdUSer = Yii::$app->user->identity->id ;
		$mutasi->StokAwal = $barang->StokBarang;
		$mutasi->StokAkhir = $barang->StokBarang + $model->Qty;
		$mutasi->TglMutasi = date('Y-m-d H:i:s');
		if($mutasi->save()){
			$barang->StokBarang = $barang->StokBarang + $model->Qty;
			$barang->save();
			$model->delete();
			return $this->redirect(Yii::$app->request->referrer);
		}
		
	}
    /**
     * Creates a new Transaksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Transaksi();

        if ($model->load(Yii::$app->request->post())) {
			$model->genKode();
			$model->TglTrx = date('Y-m-d H:i:s');
			$model->Status = 1;
			$model->IdUser = Yii::$app->user->identity->id ;
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
     * Updates an existing Transaksi model.
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
     * Deletes an existing Transaksi model.
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
     * Finds the Transaksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transaksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transaksi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
