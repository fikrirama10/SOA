<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "barang_kategori".
 *
 * @property int $Id
 * @property string|null $Kategori
 *
 * @property Barang[] $barangs
 */
class BarangKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Kategori'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Kategori' => 'Kategori',
        ];
    }

    /**
     * Gets query for [[Barangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBarangs()
    {
        return $this->hasMany(Barang::className(), ['KatBarang' => 'Id']);
    }
}
