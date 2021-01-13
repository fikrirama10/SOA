<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%barang_mutasi_jenis}}".
 *
 * @property int $Id
 * @property string|null $JenisMutasi
 *
 * @property BarangMutasi[] $barangMutasis
 */
class BarangMutasiJenis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%barang_mutasi_jenis}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['JenisMutasi'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'JenisMutasi' => 'Jenis Mutasi',
        ];
    }

    /**
     * Gets query for [[BarangMutasis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBarangMutasis()
    {
        return $this->hasMany(BarangMutasi::className(), ['JenisMutasi' => 'Id']);
    }
}
