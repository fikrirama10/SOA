<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BarangStok */

$this->title = 'Create Barang Stok';
$this->params['breadcrumbs'][] = ['label' => 'Barang Stoks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-create">
<div class="col-sm-4">
	<div class='panel panel-default'>
		<div class='panel-body'>
		
		<?= $this->render('_form', [
			'model' => $model,
		]) ?>
		</div>
	</div>
</div>
</div>
