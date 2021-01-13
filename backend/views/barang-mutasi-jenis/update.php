<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BarangMutasiJenis */

$this->title = 'Update Barang Mutasi Jenis: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Barang Mutasi Jenis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="barang-update">
<div class="col-sm-4">
<div class='panel panel-default'>
		<div class='panel-body'>
    <?= $this->render('_form', ['model' => $model,]) ?>
		</div>
	</div>
</div>
</div>

