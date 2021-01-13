<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BarangRequest */

$this->title = 'Update Barang Request: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Barang Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="barang-request-update">
<div class="col-sm-6">
	<div class='panel panel-default'>
		<div class='panel-body'>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
</div>

