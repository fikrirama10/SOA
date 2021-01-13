<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%barang_mutasi}}".
 *
 * @property int $Id
 * @property string|null $KodeBarang
 * @property int|null $Qty
 * @property int|null $BarangMasuk
 * @property int|null $BarangKeluar
 * @property int|null $StokAwal
 * @property int|null $StokAkhir
 * @property string|null $TglMutasi
 * @property int|null $JenisMutasi
 *
 * @property Barang $kodeBarang
 * @property BarangMutasiJenis $jenisMutasi
 */
class BarangMutasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%barang_mutasi}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Qty', 'BarangMasuk', 'BarangKeluar', 'StokAwal', 'StokAkhir', 'JenisMutasi'], 'integer'],
            [['TglMutasi'], 'safe'],
            [['KodeBarang'], 'string', 'max' => 50],
            [['KodeBarang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['KodeBarang' => 'KodeBarang']],
            [['JenisMutasi'], 'exist', 'skipOnError' => true, 'targetClass' => BarangMutasiJenis::className(), 'targetAttribute' => ['JenisMutasi' => 'Id']],
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
            'BarangMasuk' => 'Barang Masuk',
            'BarangKeluar' => 'Barang Keluar',
            'StokAwal' => 'Stok Awal',
            'StokAkhir' => 'Stok Akhir',
            'TglMutasi' => 'Tgl Mutasi',
            'JenisMutasi' => 'Jenis Mutasi',
        ];
    }

    /**
     * Gets query for [[KodeBarang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKode()
    {
        return $this->hasOne(Barang::className(), ['KodeBarang' => 'KodeBarang']);
    }

    /**
     * Gets query for [[JenisMutasi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisMutasi()
    {
        return $this->hasOne(BarangMutasiJenis::className(), ['Id' => 'JenisMutasi']);
    }
}
