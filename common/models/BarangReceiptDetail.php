<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%barang_receipt_detail}}".
 *
 * @property int $Id
 * @property string|null $KodeReceipt
 * @property int|null $Qty
 * @property int|null $QtyRequest
 * @property string|null $KodeBarang
 * @property string|null $TglReceipt
 *
 * @property Barang $kodeBarang
 * @property BarangReceipt $kodeReceipt
 */
class BarangReceiptDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%barang_receipt_detail}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Qty', 'QtyRequest'], 'integer'],
            [['TglReceipt'], 'safe'],
            [['KodeReceipt', 'KodeBarang'], 'string', 'max' => 50],
            [['KodeBarang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['KodeBarang' => 'KodeBarang']],
            [['KodeReceipt'], 'exist', 'skipOnError' => true, 'targetClass' => BarangReceipt::className(), 'targetAttribute' => ['KodeReceipt' => 'KodeReceipt']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'KodeReceipt' => 'Kode Receipt',
            'Qty' => 'Qty',
            'QtyRequest' => 'Qty Request',
            'KodeBarang' => 'Kode Barang',
            'TglReceipt' => 'Tgl Receipt',
        ];
    }

    /**
     * Gets query for [[KodeBarang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKodeBarang()
    {
        return $this->hasOne(Barang::className(), ['KodeBarang' => 'KodeBarang']);
    }

    /**
     * Gets query for [[KodeReceipt]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKodeReceipt()
    {
        return $this->hasOne(BarangReceipt::className(), ['KodeReceipt' => 'KodeReceipt']);
    }
}
