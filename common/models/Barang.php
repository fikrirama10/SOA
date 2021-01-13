<?php

namespace common\models;

use Yii;

class Barang extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return '{{%barang}}';
    }

   
    public function rules()
    {
        return [
            [['KodeBarang'], 'required'],
            [['KatBarang', 'StokBarang', 'IdSatuan'], 'integer'],
            [['HargaBarang', 'HargaJual'], 'number'],
            [['KodeBarang', 'NamaBarang'], 'string', 'max' => 50],
        ];
    }

   	 public function getKategori()
    {
        return $this->hasOne(BarangKategori::className(), ['Id' => 'KatBarang']);
    }
	public function getSatuan()
    {
        return $this->hasOne(BarangSatuan::className(), ['Id' => 'IdSatuan']);
    }
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'KodeBarang' => 'Kode Barang',
            'KatBarang' => 'Kat Barang',
            'NamaBarang' => 'Nama Barang',
            'HargaBarang' => 'Harga Barang',
            'StokBarang' => 'Stok Barang',
            'IdSatuan' => 'Id Satuan',
            'HargaJual' => 'Harga Jual',
        ];
    }


   
	public function genKode()
	{
		$tgl='BRG';
		
		$pf=$tgl;
		$max = $this::find()->select('max(KodeBarang)')->andFilterWhere(['like','KodeBarang',$pf])->scalar(); 
		$last=substr($max,strlen($pf),4) + 1;
		
		if($last<10){
			$id=$pf.'000'.$last;}
		elseif($last<100){
			$id=$pf.'00'.$last;}
		elseif($last<1000){
			$id=$pf.'0'.$last;}
		elseif($last<10000){
			$id=$pf.$last;}
		$this->KodeBarang=$id;
		
	}
}
