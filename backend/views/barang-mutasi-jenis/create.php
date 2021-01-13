<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BarangMutasiJenis */

$this->title = 'Create Barang Mutasi Jenis';
$this->params['breadcrumbs'][] = ['label' => 'Barang Mutasi Jenis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-mutasi-jenis-create">
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

