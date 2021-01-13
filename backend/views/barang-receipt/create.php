<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BarangReceipt */

$this->title = 'Create Barang Receipt';
$this->params['breadcrumbs'][] = ['label' => 'Barang Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-create">
<div class='row'>
<div class='col-md-6'>
	<div class='panel panel-default'>
		<div class='panel-body'>
		
		<?= $this->render('_form', [
			'model' => $model,
		]) ?>
		</div>
		</div>
	</div>
</div>
</div>
