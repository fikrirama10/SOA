<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TransaksiDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KodeTrx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KodeBarang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Qty')->textInput() ?>

    <?= $form->field($model, 'Harga')->textInput() ?>

    <?= $form->field($model, 'SubTotal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
