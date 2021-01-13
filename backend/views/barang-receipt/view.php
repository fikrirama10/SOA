<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BarangReceipt */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Barang Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="barang-receipt-view">
	<div class='row'>
		<div class='col-md-9'>
			<div class='panel panel-default'>
				<div class='panel-body'>
    <h1><?= Html::encode($this->title) ?></h1>

   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id',
            'KodeReceipt',
            'KodeRequest',
            'Keterangan',
            'User',
            'TglReceipt',
        ],
    ]) ?>
<p>
						<?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
						<?= Html::a('Delete', ['delete', 'id' => $model->Id], [
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
