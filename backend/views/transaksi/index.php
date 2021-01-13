<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TransaksiDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Transaksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-detail-index box box-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kasir', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'KodeTrx',
            'Customer',
            'SubTotal',
            
           
            'TglTrx',
            //'KodeRequest',

            [
						'class' => 'yii\grid\ActionColumn',
						'template' => '{view} {update} ',
						'buttons' => [
								
								'view' => function ($url,$model) {
										return Html::a(
												'<span class="label label-primary"><span class="fa fa-folder-open"></span></span>', 
												$url);
								},
														
								'update' => function ($url,$model) {
										return Html::a(
												'<span class="label label-success"><span class="fa fa-pencil"></span></span>', 
												$url);
								},
																
								
								
								
							],
					],
				],
			]); ?>


</div>
