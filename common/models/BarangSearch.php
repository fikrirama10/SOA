<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Barang;

/**
 * BarangSearch represents the model behind the search form of `common\models\Barang`.
 */
class BarangSearch extends Barang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'KatBarang', 'StokBarang', 'IdSatuan'], 'integer'],
            [['KodeBarang', 'NamaBarang'], 'safe'],
            [['HargaBarang', 'HargaJual'], 'number'],
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
        $query = Barang::find();

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
            'KatBarang' => $this->KatBarang,
            'HargaBarang' => $this->HargaBarang,
            'StokBarang' => $this->StokBarang,
            'IdSatuan' => $this->IdSatuan,
            'HargaJual' => $this->HargaJual,
        ]);

        $query->andFilterWhere(['like', 'KodeBarang', $this->KodeBarang])
            ->andFilterWhere(['like', 'NamaBarang', $this->NamaBarang]);

        return $dataProvider;
    }
}
