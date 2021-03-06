<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BarangStok */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Barang Stoks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="barang-stok-view">
	<div class="row">
		<div class="col-sm-6">
			<div class='panel panel-default'>
				<div class='panel-body'>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id',
            'KodeBarang',
            'Qty',
            'LastUpdate',
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
