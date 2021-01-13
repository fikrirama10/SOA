<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Barang */

$this->title = 'Create Barang';
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-create">
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
