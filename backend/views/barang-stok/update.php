<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BarangStok */

$this->title = 'Update Barang Stok: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Barang Stoks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="articles-update">
<div class="col-sm-5">
	<div class='panel panel-default'>
		<div class='panel-body'>
        <?= $this->render('_form', ['model' => $model,]) ?>
		</div>
	</div>
</div>
</div>