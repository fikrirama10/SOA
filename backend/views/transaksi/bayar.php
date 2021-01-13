<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;
use common\models\Barang;
use common\models\TransaksiJenis;
use common\models\TransaksiDetail;
$no = 1;
$total = 0;

/* @var $this yii\web\View */
/* @var $model common\models\Transaksi */
$this->title = 'Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Transaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
.disabel{display:none;}
</style>
<div class='row'>
	<div class='col-md-8'>
		<div class='panel'>
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
		<div class='panel'>
			<div class='panel-heading'><h4>Transaksi Detail</h4></div>
			<div class='panel-body'>
				<table class='table'>
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Qty</th>
						<th>Harga</th>
						<th>Total</th>
					</tr>
					<?php foreach($transaksi as $tr): ?>
					<tr>
						<td><?= $no++  ?></td>
						<td><?= $tr->barang->NamaBarang  ?></td>
						<td><?= $tr->Qty  ?></td>
						<td><?= Yii::$app->algo->IndoCurr($tr->Harga)?></td>
						<td><?= Yii::$app->algo->IndoCurr($tr->SubTotal)?></td>
					</tr>
					<?php 
							$total += $tr->SubTotal;
						?>
					<?php endforeach; ?>
					<tr>
						<td align='right' colspan='4'><b>Total</b></td>
						<td><b>Rp. <?= Yii::$app->algo->IndoCurr($total)?></b></td>
					</tr>
					<tr>
						<td align='right' colspan='4'><b>Diskon</b></td>
						<td>0% (Rp. )</td>
					</tr>
					<tr>
						<td align='right' colspan='4'>PPN</td>
						<td>0% (Rp. )</td>
					</tr>
					<tr>
						<td align='right' colspan='4'>SubTotal</td>
						<td><b>Rp. <?= Yii::$app->algo->IndoCurr($total)?></b></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class='col-md-4'>
		<div class='panel panel-default'>
			<div class='panel-heading'>Pembayaran</div>
			<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
			<div class='panel-body'>
				
				<?= $form->field($model, 'JenisBayar')->dropDownList(ArrayHelper::map(TransaksiJenis::find()->all(), 'Id', 'Jenis'),['prompt'=>'- Pilih Pembayaran -'])->label(false)?>
				
				<div id='pembayaran'>
				<?= $form->field($model, 'NoCard')->textInput(['maxlength' => true])->label('Nomor Kartu') ?>
				</div>
				<input type='hidden' id='coba' name='coba'>
			</div>
			<div class='panel-footer'>
				<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
<?php 

$this->registerJs("

				$('#pembayaran').addClass('disabel');		
				$('#transaksi-jenisbayar').on('change',function() {
				
                var dob = $('#transaksi-jenisbayar').val();
				$('#coba').val(dob);
				if(dob > 1){
				$('#pembayaran').removeClass('disabel');
				
				}else{
				$('#pembayaran').addClass('disabel');
				}
				});
        
	

", View::POS_READY);
?>

