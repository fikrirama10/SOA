<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BarangReceiptDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-receipt-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'KodeReceipt') ?>

    <?= $form->field($model, 'Qty') ?>

    <?= $form->field($model, 'QtyRequest') ?>

    <?= $form->field($model, 'KodeBarang') ?>

    <?php // echo $form->field($model, 'TglReceipt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
