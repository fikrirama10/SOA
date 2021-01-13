<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BarangReceiptDetail */

$this->title = 'Create Barang Receipt Detail';
$this->params['breadcrumbs'][] = ['label' => 'Barang Receipt Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-receipt-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
