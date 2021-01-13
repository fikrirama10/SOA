<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Barang;
/* @var $this yii\web\View */
/* @var $model common\models\BarangStok */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-stok-form">
	<div class='row'>

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
		<div class='col-md-12'>

   <?= $form->field($model, 'KodeBarang')->dropDownList(ArrayHelper::map(Barang::find()->all(), 'KodeBarang', 'KodeBarang'))->label('Kategori',['class'=>'label-class'])?>
 

    <?= $form->field($model, 'Qty')->textInput() ?>
	
	<?= $form->field($model, 'LastUpdate')->hiddenInput(['value'=>date('Y-m-d')])->label(false); ?>
   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
