<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BarangReceipt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-receipt-form">
	<div class='row'>
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
	<div class='col-md-12'>

    <?= $form->field($model, 'KodeReceipt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KodeRequest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'User')->textInput() ?>

    <?= $form->field($model, 'TglReceipt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
