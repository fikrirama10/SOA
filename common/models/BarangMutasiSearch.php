<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BarangMutasi;

/**
 * BarangMutasiSearch represents the model behind the search form of `common\models\BarangMutasi`.
 */
class BarangMutasiSearch extends BarangMutasi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Qty', 'BarangMasuk', 'BarangKeluar', 'StokAwal', 'StokAkhir', 'JenisMutasi'], 'integer'],
            [['KodeBarang', 'TglMutasi'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BarangMutasi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Id' => $this->Id,
            'Qty' => $this->Qty,
            'BarangMasuk' => $this->BarangMasuk,
            'BarangKeluar' => $this->BarangKeluar,
            'StokAwal' => $this->StokAwal,
            'StokAkhir' => $this->StokAkhir,
            'TglMutasi' => $this->TglMutasi,
            'JenisMutasi' => $this->JenisMutasi,
        ]);

        $query->andFilterWhere(['like', 'KodeBarang', $this->KodeBarang]);

        return $dataProvider;
    }
}
