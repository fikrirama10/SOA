<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'UserId') ?>

    <?= $form->field($model, 'Username') ?>

    <?= $form->field($model, 'Authkey') ?>

    <?= $form->field($model, 'Password') ?>

    <?= $form->field($model, 'PasswordResetToken') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'IdPriv') ?>

    <?php // echo $form->field($model, 'Login') ?>

    <?php // echo $form->field($model, 'LastLogin') ?>

    <?php // echo $form->field($model, 'IdM') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
