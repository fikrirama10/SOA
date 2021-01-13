<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%barang_receipt}}".
 *
 * @property int $Id
 * @property string $KodeReceipt
 * @property string|null $KodeRequest
 * @property string|null $Keterangan
 * @property int|null $User
 * @property string|null $TglReceipt
 *
 * @property BarangReceiptDetail[] $barangReceiptDetails
 */
class BarangReceipt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%barang_receipt}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KodeReceipt'], 'required'],
            [['User'], 'integer'],
            [['TglReceipt'], 'safe'],
            [['KodeReceipt', 'KodeRequest', 'Keterangan'], 'string', 'max' => 50],
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
            'KodeRequest' => 'Kode Request',
            'Keterangan' => 'Keterangan',
            'User' => 'User',
            'TglReceipt' => 'Tgl Receipt',
        ];
    }

    /**
     * Gets query for [[BarangReceiptDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBarangReceiptDetails()
    {
        return $this->hasMany(BarangReceiptDetail::className(), ['KodeReceipt' => 'KodeReceipt']);
    }
}
