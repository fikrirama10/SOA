<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Barang;
use common\models\BarangMutasiJenis;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\BarangMutasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-mutasi-form">
<div class='row'>
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
	<div class='col-md-12'>

	<?= $form->field($model, 'KodeBarang')->dropDownList(ArrayHelper::map(Barang::find()->all(), 'KodeBarang', 'KodeBarang'))->label('Kategori',['class'=>'label-class'])?>
 

    <?= $form->field($model, 'Qty')->textInput() ?>

    <?= $form->field($model, 'BarangMasuk')->textInput() ?>

    <?= $form->field($model, 'BarangKeluar')->textInput() ?>

    <?= $form->field($model, 'StokAwal')->textInput() ?>

    <?= $form->field($model, 'StokAkhir')->textInput() ?>

	<?= $form->field($model, 'TglMutasi')->hiddenInput(['value'=>date('Y-m-d')])->label(false); ?>
    
	<?= $form->field($model, 'JenisMutasi')->dropDownList(ArrayHelper::map(BarangMutasiJenis::find()->all(), 'Id', 'JenisMutasi'))->label('JenisMutasi',['class'=>'label-class'])?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
