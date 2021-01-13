<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BarangReceipt;

/**
 * BarangReceiptSearch represents the model behind the search form of `common\models\BarangReceipt`.
 */
class BarangReceiptSearch extends BarangReceipt
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'User'], 'integer'],
            [['KodeReceipt', 'KodeRequest', 'Keterangan', 'TglReceipt'], 'safe'],
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
        $query = BarangReceipt::find();

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
            'User' => $this->User,
            'TglReceipt' => $this->TglReceipt,
        ]);

        $query->andFilterWhere(['like', 'KodeReceipt', $this->KodeReceipt])
            ->andFilterWhere(['like', 'KodeRequest', $this->KodeRequest])
            ->andFilterWhere(['like', 'Keterangan', $this->Keterangan]);

        return $dataProvider;
    }
}
