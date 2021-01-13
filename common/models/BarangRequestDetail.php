<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%barang_request_detail}}".
 *
 * @property int $Id
 * @property string|null $KodeRequest
 * @property string|null $KodeBarang
 * @property int|null $Qty
 * @property string|null $Ket
 *
 * @property Barang $kodeBarang
 * @property BarangRequest $kodeRequest
 */
class BarangRequestDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%barang_request_detail}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Qty'], 'integer'],
            [['KodeRequest', 'KodeBarang', 'Ket'], 'string', 'max' => 50],
            [['KodeBarang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['KodeBarang' => 'KodeBarang']],
            [['KodeRequest'], 'exist', 'skipOnError' => true, 'targetClass' => BarangRequest::className(), 'targetAttribute' => ['KodeRequest' => 'KodeRequest']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'KodeRequest' => 'Kode Request',
            'KodeBarang' => 'Kode Barang',
            'Qty' => 'Qty',
            'Ket' => 'Ket',
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
     * Gets query for [[KodeRequest]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKodeRequest()
    {
        return $this->hasOne(BarangRequest::className(), ['KodeRequest' => 'KodeRequest']);
    }
}
