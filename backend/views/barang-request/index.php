<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BarangRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barang Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-request-index">
<div class='panel panel-default'>
		<div class='panel-body'>
	
			
			<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

			<p>
				<?= Html::a("<i class='fa fa-plus-square-o'></i> Requests", ['create'], ['class' => 'btn btn-success pull-right mbot10']) ?>
			</p>
<br><br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'KodeRequest',
            'JudulReq',
            'Keterangan',
            'status.Status',
           
            'TglRequest',
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
	</div>
</div>
