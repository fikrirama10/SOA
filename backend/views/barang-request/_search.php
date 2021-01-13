<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BarangRequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'Keterangan') ?>

    <?= $form->field($model, 'Status') ?>

    <?= $form->field($model, 'IdUser') ?>

    <?= $form->field($model, 'TglRequest') ?>

    <?php // echo $form->field($model, 'KodeRequest') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
