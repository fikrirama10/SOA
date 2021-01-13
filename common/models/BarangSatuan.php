<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "barang_satuan".
 *
 * @property int $Id
 * @property string|null $Satuan
 */
class BarangSatuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang_satuan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Satuan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Satuan' => 'Satuan',
        ];
    }
}
