<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TransaksiDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transaksi Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'KodeTrx',
            'KodeBarang',
            'Qty',
            'Harga',
            //'SubTotal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
