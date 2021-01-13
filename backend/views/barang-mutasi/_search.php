<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BarangMutasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-mutasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'KodeBarang') ?>

    <?= $form->field($model, 'Qty') ?>

    <?= $form->field($model, 'BarangMasuk') ?>

    <?= $form->field($model, 'BarangKeluar') ?>

    <?php // echo $form->field($model, 'StokAwal') ?>

    <?php // echo $form->field($model, 'StokAkhir') ?>

    <?php // echo $form->field($model, 'TglMutasi') ?>

    <?php // echo $form->field($model, 'JenisMutasi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
