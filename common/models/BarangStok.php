<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%barang_stok}}".
 *
 * @property int $Id
 * @property string|null $KodeBarang
 * @property int|null $Qty
 * @property string|null $LastUpdate
 *
 * @property Barang $kodeBarang
 */
class BarangStok extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%barang_stok}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Qty'], 'integer'],
            [['LastUpdate'], 'safe'],
            [['KodeBarang'], 'string', 'max' => 50],
            [['KodeBarang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['KodeBarang' => 'KodeBarang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'KodeBarang' => 'Kode Barang',
            'Qty' => 'Qty',
            'LastUpdate' => 'Last Update',
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
}
