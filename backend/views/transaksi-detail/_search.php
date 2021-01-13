<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TransaksiDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'KodeTrx') ?>

    <?= $form->field($model, 'KodeBarang') ?>

    <?= $form->field($model, 'Qty') ?>

    <?= $form->field($model, 'Harga') ?>

    <?php // echo $form->field($model, 'SubTotal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
