<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%transaksi}}".
 *
 * @property int $Id
 * @property string $KodeTrx
 * @property int|null $IdCust
 * @property string|null $TglTrx
 * @property int|null $Status
 * @property int|null $SubTotal
 *
 * @property TransaksiDetail[] $transaksiDetails
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%transaksi}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KodeTrx'], 'required'],
            [['Status', 'SubTotal','JenisBayar'], 'integer'],
            [['Customer','TglTrx'], 'safe'],
            [['KodeTrx','NoCard'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'KodeTrx' => 'Kode Trx',
            'IdCust' => 'Id Cust',
            'TglTrx' => 'Tgl Trx',
            'Status' => 'Status',
            'SubTotal' => 'Sub Total',
        ];
    }

    /**
     * Gets query for [[TransaksiDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
	public function genKode()
	{
		$tgl='TRX';
		
		$pf=$tgl.'/'.date('Y/m/d');
		$max = $this::find()->select('max(KodeTrx)')->andFilterWhere(['like','KodeTrx',$pf])->scalar(); 
		$last=substr($max,strlen($pf),4) + 1;
		
		if($last<10){
			$id=$pf.'000'.$last;}
		elseif($last<100){
			$id=$pf.'00'.$last;}
		elseif($last<1000){
			$id=$pf.'0'.$last;}
		elseif($last<10000){
			$id=$pf.$last;}
		$this->KodeTrx=$id;
		
	}
    
}
