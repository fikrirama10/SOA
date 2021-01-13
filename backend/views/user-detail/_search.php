<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'IdM') ?>

    <?= $form->field($model, 'Nama') ?>

    <?= $form->field($model, 'IdCard') ?>

    <?= $form->field($model, 'CardNo') ?>

    <?php // echo $form->field($model, 'Jk') ?>

    <?php // echo $form->field($model, 'Alamat') ?>

    <?php // echo $form->field($model, 'Kota') ?>

    <?php // echo $form->field($model, 'IdProv') ?>

    <?php // echo $form->field($model, 'Pos') ?>

    <?php // echo $form->field($model, 'Telepon') ?>

    <?php // echo $form->field($model, 'HP') ?>

    <?php // echo $form->field($model, 'Lahir') ?>

    <?php // echo $form->field($model, 'TglLahir') ?>

    <?php // echo $form->field($model, 'IdStat') ?>

    <?php // echo $form->field($model, 'IsAdmin') ?>

    <?php // echo $form->field($model, 'Created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
