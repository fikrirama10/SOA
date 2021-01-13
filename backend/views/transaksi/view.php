<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Barang;
use common\models\TransaksiDetail;
$total = 0;
/* @var $this yii\web\View */
/* @var $model common\models\Transaksi */
$transaksi = TransaksiDetail::find()->where(['KodeTrx'=>$model->KodeTrx])->all();
$this->title = 'Transaksi Kasir';
$this->params['breadcrumbs'][] = ['label' => 'Transaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transaksi-view">
	<div class='row'>
		<div class='col-md-8'>
			<div class='panel panel-default'>
				<div class='panel-body'>
					<?= DetailView::widget([
					'model' => $model,
					'attributes' => [

					'KodeTrx',
					'Customer',
					'TglTrx',

					],
					]) ?>
				</div>
			</div>
		
	
			<div class='panel panel-default'>
				<div class='panel-heading'>Daftar Barang</div>
				<div class='panel-body'>
					<?php if($model->Status < 2){ ?>
					<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>		
						<div class='row'>
							<div class='col-md-6'>
							<?= $form->field($barang, 'KodeBarang')->dropDownList(ArrayHelper::map(Barang::find()->all(), 'KodeBarang', 'NamaBarang'),['prompt'=>'- Pilih Barang -','required'=>true])->label('Barang',['class'=>'label-class'])?>
							</div>
							<div class='col-md-3'>
							<?= $form->field($barang, 'Qty')->textInput(['maxlength' => true]) ?>
							</div>
							<div class='col-md-3'>
								<div class="form-group"><label>_</label><br>
									<?= Html::submitButton('+', ['class' => 'btn btn-success']) ?>
								</div>
							</div>
						</div>
							   
						

					<?php ActiveForm::end(); ?>
					<?php }?>
					<div class='row'>
				<div class='col-md-12'>
					<?php if($transaksi){ $no=1; ?>
					<table class='table table-bordered'>
						<tr>
							<th>No</th>
							<th>Nama Barang</th>
							<th>Qty</th>
							<th>Harga</th>
							<th>Total</th>
							<?php if($model->Status < 2){ ?>
							<th>Batal</th>
							<?php }?>
						</tr>
						
						<?php foreach($transaksi as $bd):?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $bd->barang->NamaBarang?></td>
							<td><?= $bd->Qty ?> <?= $bd->barang->satuan->Satuan ?> </td>
							<td><?= $bd->Harga ?> </td>
							<td><?= $bd->SubTotal ?> </td>
							<?php if($model->Status < 2){ ?>
							<td><a href='<?= Yii::$app->params['baseUrl'].'/dashboard/transaksi/batal?id='.$bd->Id?>' data-confirm="Are you sure ?" class='label label-danger'><span class='fa fa-trash'></span></a></td>
							<?php }?>
						</tr>
						<?php 
							$total += $bd->SubTotal;
						?>
						<?php endforeach; ?>
						<?php } ?>
					</table>
				</div>
			</div>
				</div>
				<div class='panel-footer'>
				<a href='<?= Yii::$app->params['baseUrl'].'/dashboard/transaksi'?>'  class='btn btn-warning btn-md'>Kembali</a>
				</div>
			</div>
		</div>
		<div class='col-md-4'>
			<div class='panel panel-default'>
				<div class='panel-heading'>Total Transaksi</div>
				<div class='panel-body'>
					<table class='table'>
						<tr>
							<th>Total</th>
							<td>Rp. <?= $total ?></td>
						</tr>
						<tr>
							<th>Diskon</th>
							<td>0%</td>
						</tr>
						<tr>
							<th>PPN</th>
							<td>0%</td>
						</tr>
						<tr>
							<th><h4>Sub Total</h4></th>
							<th><h5>Rp. <?= $total ?></h5></th>
						</tr>
					</table>
				</div>
			<div class='panel-footer'>
			<?php if($model->Status < 2){ ?>
			<a href='<?= Yii::$app->params['baseUrl'].'/dashboard/transaksi/bayar?id='.$model->Id?>'  class='btn btn-warning btn-md'>Bayar</a>
			<?php } ?>
		</div>
			</div>
			
		</div>
	</div>
</div>

