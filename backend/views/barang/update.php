<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Barang */

$this->title = 'Update Barang: ' ;
$this->params['breadcrumbs'][] = ['label' => 'Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="barang-update">
<div class='panel panel-default'>
		<div class='panel-body'>
    <?= $this->render('_form', ['model' => $model,]) ?>
		</div>
	</div>
</div>
