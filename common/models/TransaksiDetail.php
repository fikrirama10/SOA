<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%transaksi_detail}}".
 *
 * @property int $Id
 * @property string|null $KodeTrx
 * @property string|null $KodeBarang
 * @property int|null $Qty
 * @property int|null $Harga
 * @property int|null $SubTotal
 *
 * @property Barang $kodeBarang
 * @property Transaksi $kodeTrx
 */
class TransaksiDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%transaksi_detail}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Qty', 'Harga', 'SubTotal'], 'integer'],
            [['KodeTrx', 'KodeBarang'], 'string', 'max' => 50],
            [['KodeBarang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['KodeBarang' => 'KodeBarang']],
            [['KodeTrx'], 'exist', 'skipOnError' => true, 'targetClass' => Transaksi::className(), 'targetAttribute' => ['KodeTrx' => 'KodeTrx']],
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
            'KodeBarang' => 'Kode Barang',
            'Qty' => 'Qty',
            'Harga' => 'Harga',
            'SubTotal' => 'Sub Total',
        ];
    }

    /**
     * Gets query for [[KodeBarang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(Barang::className(), ['KodeBarang' => 'KodeBarang']);
    }

    /**
     * Gets query for [[KodeTrx]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKodeTrx()
    {
        return $this->hasOne(Transaksi::className(), ['KodeTrx' => 'KodeTrx']);
    }
}
