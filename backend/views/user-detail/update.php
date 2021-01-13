<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserDetail */

$this->title = 'Update User Detail: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'User Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
<div class="col-sm-7">
<div class="user-detail-update">

<div class='panel panel-default'>

		<div class='panel-body'>
		
    <?= $this->render('_form', [
        'model' => $model,
		   'user' => $user,
    ]) ?>

</div>
	</div>
</div>
</div>

