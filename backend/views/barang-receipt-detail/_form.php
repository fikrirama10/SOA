<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BarangReceiptDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-receipt-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KodeReceipt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Qty')->textInput() ?>

    <?= $form->field($model, 'QtyRequest')->textInput() ?>

    <?= $form->field($model, 'KodeBarang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TglReceipt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
