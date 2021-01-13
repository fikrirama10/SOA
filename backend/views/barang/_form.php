<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\money\MaskMoney;
use common\models\BarangKategori;
use common\models\BarangSatuan;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Barang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-form">
<div class='row'>
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
	<div class='col-md-8'>



    <?= $form->field($model, 'NamaBarang')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'KatBarang')->dropDownList(ArrayHelper::map(BarangKategori::find()->all(), 'Id', 'Kategori'))->label('Kategori',['class'=>'label-class'])?>
	<?= $form->field($model, 'IdSatuan')->dropDownList(ArrayHelper::map(BarangSatuan::find()->all(), 'Id', 'Satuan'))->label('Satuan',['class'=>'label-class'])?>
	<?= $form->field($model, 'HargaBarang')->widget(MaskMoney::classname(), [
		'pluginOptions' => [
			'prefix' => 'Rp ',
			'suffix' => '',
			'allowNegative' => false
		]
	]); ?>
    <?= $form->field($model, 'StokBarang')->textInput() ?>
    <?= $form->field($model, 'HargaJual')->widget(MaskMoney::classname(), [
		'pluginOptions' => [
			'prefix' => 'Rp ',
			'suffix' => '',
			'allowNegative' => false
		]
	]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
