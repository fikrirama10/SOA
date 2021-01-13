<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BarangReceipt */

$this->title = 'Update Barang Receipt: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Barang Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="articles-update">
<div class="col-sm-6">
	<div class='panel panel-default'>
		<div class='panel-body'>
        <?= $this->render('_form', ['model' => $model,]) ?>
		</div>
	</div>
</div>
</div>
