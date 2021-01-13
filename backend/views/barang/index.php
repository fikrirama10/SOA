<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-index">
	<div class='panel panel-default'>
		<div class='panel-body'>
		
			<p>
				<?= Html::a("<i class='fa fa-plus-square-o'></i> Create Barang", ['create'], ['class' => 'btn btn-success pull-right mbot10']) ?>
			</p>
			<br>
      
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Id',
            'KodeBarang',
            'NamaBarang',
            'kategori.Kategori',
            'StokBarang',
            'satuan.Satuan',
            'HargaBarang',
            'HargaJual',
            //'StokBarang',
            //'IdSatuan',
            //'HargaJual',

			[
						'class' => 'yii\grid\ActionColumn',
						'template' => '{view} {update} {delete} {link} {publish}',
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
																
								'delete' => function ($url,$model) {
										return Html::a(
												'<span class="label label-danger"><span class="fa fa-close"></span></span>', 
												$url,
												[
												'title' => Yii::t('yii', 'Delete'),
												'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),
												'data-method' => 'post',
												]);
								},
								
								
							],
					],
        ],
    ]); ?>


</div>
