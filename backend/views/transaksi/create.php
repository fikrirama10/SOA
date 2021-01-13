<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Transaksi */

$this->title = 'Buat Transaksi';
$this->params['breadcrumbs'][] = ['label' => 'Transaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-create">
	<div class='col-sm-5'>
	<div class='panel panel-default'>
		<div class='panel-body'>
		
		<?= $this->render('_form', [
			'model' => $model,
		]) ?>
		</div>
	</div>
</div>
</div>

