<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BarangRequest */

$this->title = 'Create Barang Request';
$this->params['breadcrumbs'][] = ['label' => 'Barang Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-create">
<div class="col-md-5">
	<div class='panel panel-default'>
		<div class='panel-body'>
		
		<?= $this->render('_form', [
			'model' => $model,
		]) ?>
		</div>
	</div>
</div>
</div>

