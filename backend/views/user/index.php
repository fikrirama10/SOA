<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

	<div class='panel panel-default'>
		<div class='panel-body'>
   <p class='pull-right'>
   
				<?= Html::a('Register User', ['user-detail/create'], ['class' => 'btn btn-success mbot10']) ?>
			</p>

			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				//'filterModel' => $searchModel,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],

					//'UserId',
					[
						'attribute' => 'Nama',
						'format' => 'raw',
						'value' => function ($model, $key, $index) { 
							return Html::a(strtoupper($model->detail->Nama),['view','id' => $model->Id],[]);
						},
					],
					'Username',
					['label' => 'Hak Akses','attribute' => 'priviledges.Priviledges'],
					//'AuthKey',
					//'Password',
					//'PasswordResetToken',
					'Email:email',
					// 'Login',
					[
						'label' => 'Last Login',
						'attribute' => 'LastLogin',
						'format' => 'raw',
						'value' => function ($model, $key, $index) { 
							return Yii::$app->formatter->asDateTime($model->LastLogin);
						},
					],
					// 'IdM',
					//'LastIP',
					// 'Enabled',

					[
						'class' => 'yii\grid\ActionColumn',
						'template' => '{view} {update} {delete}',
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
	</div>
</div>
