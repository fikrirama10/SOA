<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BarangMutasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barang Mutasi';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-mutasi-index">
<div class='panel panel-default'>
		<div class='panel-body'>
		
			<p>
				<?= Html::a("<i class='fa fa-plus-square-o'></i> Create ", ['create'], ['class' => 'btn btn-success pull-right mbot10']) ?>
			</p>
			<br>
		
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'Id',
          ['label' => 'Kode Barang','attribute' => 'kode.KodeBarang'],
            'Qty',
            'BarangMasuk',
            'BarangKeluar',
            'StokAwal',
            //'StokAkhir',
            //'TglMutasi',
            //'JenisMutasi',

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