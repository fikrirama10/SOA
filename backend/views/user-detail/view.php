<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserDetail */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'User Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-detail-view">
	<div class="row">
		<div class="col-sm-6">
			<div class='panel panel-default'>
				<div class='panel-body'>


   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id',
            'IdM',
            'Nama',
            'IdCard',
            'CardNo',
            'Jk',
            'Alamat',
            'Kota',
            'IdProv',
            'Pos',
            'Telepon',
            'HP',
            'Lahir',
            'TglLahir',
            'IdStat',
            'IsAdmin',
            'Created_at',
        ],
    ]) ?>
<p>
				<?= Html::a('Update', ['update', 'id'], ['class' => 'btn btn-primary']) ?>
				<?= Html::a('Delete', ['delete', 'id' ],[
					'class' => 'btn btn-danger',
					'data' => [
						'confirm' => 'Are you sure you want to delete this item?',
						'method' => 'post',
					],
				]) ?>
			</p>
		</div>
	</div>
	</div>
	</div>

</div>
