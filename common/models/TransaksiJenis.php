<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transaksi_jenis".
 *
 * @property int $Id
 * @property string|null $Jenis
 */
class TransaksiJenis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_jenis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Jenis'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Jenis' => 'Jenis',
        ];
    }
}
