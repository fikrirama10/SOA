<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\UserPriviledges;
/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
	<div class='row'>
		<div class='col-sm-6'>
			<div class='panel panel-default'>
				<?php $form = ActiveForm::begin(); ?>
				<div class='panel-heading'>
					<?= $model->detail->Nama;?>
				</div>
				
<div class='panel-body'>
					<?= $form->field($model, 'Username')->textInput(['disabled' => true]) ?>
					<?= $form->field($model, 'Password')->passwordInput(['maxlength' => true])->label('Masukan Password Baru') ?>
					<?= $form->field($model, 'IdPriv')->dropDownList(ArrayHelper::map(UserPriviledges::find()->all(), 'Id', 'Priviledges'))->label('Hak Akses',['class'=>'label-class'])?>
				</div>
				<div class='panel-footer'>
					<div class="form-group">
						<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
					</div>
				</div>
				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>
