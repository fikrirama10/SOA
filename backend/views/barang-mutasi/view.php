<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BarangMutasi */

$this->params['breadcrumbs'][] = ['label' => 'Barang Mutasis', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="barang-mutasi-view">
	<div class='panel panel-default'>
		<div class='panel-body'>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'Id',
            'KodeBarang',
            'Qty',
            'BarangMasuk',
            'BarangKeluar',
            'StokAwal',
            'StokAkhir',
            'TglMutasi',
            'JenisMutasi',
        ],
    ]) ?>
<p>
				<?= Html::a('Update', ['update', 'id'], ['class' => 'btn btn-primary']) ?>
				<?= Html::a('Delete', ['delete', 'id' ],[
					'class' => 'btn btn-danger',
					'data' => [
						'confirm' => 'Are you sure you want to delete this item?',
						'method' => 'post',
					],
				]) ?>
			</p>
		</div>
	</div>

</div>
