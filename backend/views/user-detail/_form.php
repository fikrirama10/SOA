<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use common\models\StaticContent;
use common\models\Card;
use common\models\Provinsi;
use common\models\UserPriviledges;
use common\models\UserStatus;
use kartik\datecontrol\Module;
use kartik\datecontrol\DateControl;
use kartik\date\DatePicker;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
?>

<div class="user-detail-form">
	<div class='row'>
		<div class='col-sm-12'>
			<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
			<div class='panel panel-default'>
				<div class='panel-body'>
					<?= $form->field($model, 'Nama')->textInput(['maxlength' => true]) ?>
					
					<div class='row'>
						<div class='col-sm-4'>
							<?= $form->field($model, 'Id')->dropDownList(ArrayHelper::map(Card::find()->all(), 'Id', 'Card'))->label('Kartu Identitas',['class'=>'label-class'])?>
						</div>
						<div class='col-sm-5'>
							<?= $form->field($model, 'CardNo')->textInput(['maxlength' => true])->label('Nomor Kartu Identitas') ?>
						</div>
						<div class='col-sm-3'>
							<?= $form->field($model, 'Jk')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => ''])->label('Jenis Kelamin') ?>
						</div>
					</div>
					
					<div class='row'>
						<div class='col-sm-6'>
							<?= $form->field($model, 'Lahir')->textInput(['maxlength' => true])->label('Tempat Lahir') ?>
						</div>
						<div class='col-sm-6'>
								<?=	$form->field($model, 'TglLahir')->widget(DatePicker::classname(),[
					'type' => DatePicker::TYPE_COMPONENT_APPEND,
					'pluginOptions' => [
					'autoclose'=>true,
					'format' => 'yyyy-mm-dd'
					]
					])->label('Tanggal Lahir')?>
						</div>
					</div>
					
					<?= $form->field($model, 'Alamat')->textArea(['rows' => 3]) ?>
					
					<div class='row'>
						<div class='col-sm-9'>
							<?= $form->field($model, 'Kota')->textInput(['maxlength' => true]) ?>
						</div>
						<div class='col-sm-3'>
							<?= $form->field($model, 'Pos')->textInput(['maxlength' => true]) ?>
						</div>
					</div>
					
					<?= $form->field($model, 'IdProv')->dropDownList(ArrayHelper::map(Provinsi::find()->all(), 'Id', 'Provinsi'))->label('Provinsi',['class'=>'label-class'])?>
					
					<div class='row'>
						<div class='col-sm-6'>
							<?= $form->field($model, 'Telepon')->textInput(['maxlength' => true]) ?>
						</div>
						<div class='col-sm-6'>
							<?= $form->field($model, 'HP')->textInput(['maxlength' => true])->label('No HP') ?>
						</div>
					</div>
										
					
					<?= $form->field($user, 'Email')->textInput(['maxlength' => true]) ?>
					<?= $form->field($user, 'IdPriv')->dropDownList(ArrayHelper::map(UserPriviledges::find()->all(), 'Id', 'Priviledges'))->label('Hak Akses',['class'=>'label-class'])?>
					
					<?= $form->field($user, 'Username')->textInput(['maxlength' => true]) ?>
					<?= $form->field($user, 'Password')->passwordInput(['maxlength' => true])->label('Password') ?>
					
					
					<?php
					/*
					<?= $form->field($model, 'SKPD')->dropDownList(ArrayHelper::map(Skpd::find()->all(), 'Kode', 'Institusi'))->label('SKPD',['class'=>'label-class'])?>
					*/
					?>
					
				
					<?= $form->field($model, 'IdStat')->dropDownList(ArrayHelper::map(UserStatus::find()->all(), 'Id', 'Status'))->label('Status',['class'=>'label-class'])?>
					
					

					<div class="form-group">
						<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
					</div>
				</div>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
		
	</div>


    

    

    

</div>
