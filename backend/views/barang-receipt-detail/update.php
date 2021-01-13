<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BarangReceiptDetail */

$this->title = 'Update Barang Receipt Detail: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Barang Receipt Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="barang-receipt-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
