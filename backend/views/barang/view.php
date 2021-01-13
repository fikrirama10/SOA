<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Barang */

$this->title = $model->KodeBarang;
$this->params['breadcrumbs'][] = ['label' => 'Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="barang-view">
	<div class="row">
		<div class="col-sm-6">
			<div class='panel panel-default'>
				<div class='panel-body'>


					<?= DetailView::widget([
						'model' => $model,
						'attributes' => [
							'Id',
							'KodeBarang',
							'KatBarang',
							'NamaBarang',
							'HargaBarang',
							'StokBarang',
							'IdSatuan',
							'HargaJual',
						],
					]) ?>
			<p>
				<?= Html::a('Update', ['update', 'id'], ['class' => 'btn btn-primary']) ?>
				<?= Html::a('Delete', ['delete', 'id' ],[
					'class' => 'btn btn-danger',
					'data' => [
						'confirm' => 'Are you sure you want to delete this item?',
						'method' => 'post',
					],
				]) ?>
			</p>
		</div>
	</div>
	</div>
	</div>

</div>
