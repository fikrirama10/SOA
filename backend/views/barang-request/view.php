<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Barang;
use common\models\BarangRequestDetail;
/* @var $this yii\web\View */
/* @var $model common\models\BarangRequest */
$barangdetail = BarangRequestDetail::find()->where(['KodeRequest'=>$model->KodeRequest])->all();
$this->title = $model->JudulReq;
$this->params['breadcrumbs'][] = ['label' => 'Barang Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="barang-request-view">
	<div class='panel'>
		<div class='panel-body'>
			<div class="row">
				<div class="col-sm-6">
				<?= DetailView::widget([
				'model' => $model,
				'attributes' => [
				
				'status.Status',
				'TglRequest',
				'KodeRequest',
				],
				]) ?><p>

				</p>
				</div>
			</div>

			<div class='row'>
				<div class='col-md-12'>
					<h4>Data Barang Requests</h4>
					<?php if($model->Status < 2){ ?>
					 <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>		
						<div class='row'>
							<div class='col-md-6'>
							<?= $form->field($detail, 'KodeBarang')->dropDownList(ArrayHelper::map(Barang::find()->all(), 'KodeBarang', 'NamaBarang'),['prompt'=>'- Pilih Barang -','required'=>true])->label('Barang',['class'=>'label-class'])?>
							</div>
							<div class='col-md-3'>
							<?= $form->field($detail, 'Qty')->textInput(['maxlength' => true]) ?>
							</div>
							<div class='col-md-3'>
								<div class="form-group"><label>_</label><br>
									<?= Html::submitButton('+', ['class' => 'btn btn-success']) ?>
								</div>
							</div>
						</div>
							   
						

					<?php ActiveForm::end(); ?>
					<?php }?>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-12'>
					<?php if($barangdetail){ $no=1;?>
					<table class='table table-bordered'>
						<tr>
							<th>No</th>
							<th>Nama Barang</th>
							<th>Jumlah</th>
							<th>Delete</th>
						</tr>
						<?php if($model->Status < 2){ ?>
						<?php foreach($barangdetail as $bd):?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $bd->barang->NamaBarang?></td>
							<td><a href='<?= Yii::$app->params['baseUrl'].'/dashboard/barang-request/min-detail?id='.$bd->Id?>'  class='label label-warning'><span class='fa fa-minus'></span></a> <?= $bd->Qty ?> <a href='<?= Yii::$app->params['baseUrl'].'/dashboard/barang-request/plus-detail?id='.$bd->Id?>'  class='label label-success'><span class='fa fa-plus'></span></a></td>
							<td><a href='<?= Yii::$app->params['baseUrl'].'/dashboard/barang-request/delete-detail?id='.$bd->Id?>' data-confirm="Are you sure ?" class='label label-danger'><span class='fa fa-trash'></span></a></td>
						</tr>
						<?php endforeach; ?>
						<?php }else{ ?>
						<?php foreach($barangdetail as $bd):?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $bd->barang->NamaBarang?></td>
							<td><?= $bd->Qty ?> </td>
							<td></td>
						</tr>
						<?php endforeach; ?>
						<?php } ?>
					</table>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class='panel-footer'>
			<a href='<?= Yii::$app->params['baseUrl'].'/dashboard/barang-request/selesai?id='.$model->Id?>'  class='btn btn-success btn-md'>Selesai</a>
		</div>
	</div>
	</div>
</div>
