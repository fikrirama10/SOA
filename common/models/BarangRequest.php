<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%barang_request}}".
 *
 * @property int $Id
 * @property string|null $Keterangan
 * @property int $Status
 * @property int $IdUser
 * @property string $TglRequest
 * @property string $KodeRequest
 *
 * @property BarangRequestDetail[] $barangRequestDetails
 */
class BarangRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%barang_request}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Status', 'IdUser'], 'integer'],
            [['TglRequest', 'KodeRequest'], 'required'],
            [['TglRequest'], 'safe'],
            [['Keterangan', 'KodeRequest','JudulReq'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Keterangan' => 'Keterangan',
            'Status' => 'Status',
            'IdUser' => 'Id User',
            'TglRequest' => 'Tgl Request',
            'KodeRequest' => 'Kode Request',
        ];
    }

    /**
     * Gets query for [[BarangRequestDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBarangRequestDetails()
    {
        return $this->hasMany(BarangRequestDetail::className(), ['KodeRequest' => 'KodeRequest']);
    }
	 public function getStatus()
    {
        return $this->hasOne(BarangRequestStatus::className(), ['Id' => 'Status']);
    }
	public function genKode()
	{
		$tgl='REQ';
		
		$pf=$tgl;
		$max = $this::find()->select('max(KodeRequest)')->andFilterWhere(['like','KodeRequest',$pf])->scalar(); 
		$last=substr($max,strlen($pf),4) + 1;
		
		if($last<10){
			$id=$pf.'000'.$last;}
		elseif($last<100){
			$id=$pf.'00'.$last;}
		elseif($last<1000){
			$id=$pf.'0'.$last;}
		elseif($last<10000){
			$id=$pf.$last;}
		$this->KodeRequest=$id;
		
	}
}
