<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Transaksi */

$this->title = 'Update Transaksi: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="articles-update">
	<div class='panel panel-default'>
		<div class='panel-body'>
        <?= $this->render('_form', ['model' => $model,]) ?>
		</div>
	</div>
</div>