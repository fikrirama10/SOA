<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BarangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'KodeBarang') ?>

    <?= $form->field($model, 'KatBarang') ?>

    <?= $form->field($model, 'NamaBarang') ?>

    <?= $form->field($model, 'HargaBarang') ?>

    <?php // echo $form->field($model, 'StokBarang') ?>

    <?php // echo $form->field($model, 'IdSatuan') ?>

    <?php // echo $form->field($model, 'HargaJual') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
