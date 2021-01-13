<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserDetail;

/**
 * UserDetailSearch represents the model behind the search form of `common\models\UserDetail`.
 */
class UserDetailSearch extends UserDetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'IdM', 'IdCard', 'IdProv', 'IdStat', 'IsAdmin'], 'integer'],
            [['Nama', 'CardNo', 'Jk', 'Alamat', 'Kota', 'Pos', 'Telepon', 'HP', 'Lahir', 'TglLahir', 'Created_at'], 'safe'],
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
        $query = UserDetail::find();

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
            'IdM' => $this->IdM,
            'IdCard' => $this->IdCard,
            'IdProv' => $this->IdProv,
            'TglLahir' => $this->TglLahir,
            'IdStat' => $this->IdStat,
            'IsAdmin' => $this->IsAdmin,
            'Created_at' => $this->Created_at,
        ]);

        $query->andFilterWhere(['like', 'Nama', $this->Nama])
            ->andFilterWhere(['like', 'CardNo', $this->CardNo])
            ->andFilterWhere(['like', 'Jk', $this->Jk])
            ->andFilterWhere(['like', 'Alamat', $this->Alamat])
            ->andFilterWhere(['like', 'Kota', $this->Kota])
            ->andFilterWhere(['like', 'Pos', $this->Pos])
            ->andFilterWhere(['like', 'Telepon', $this->Telepon])
            ->andFilterWhere(['like', 'HP', $this->HP])
            ->andFilterWhere(['like', 'Lahir', $this->Lahir]);

        return $dataProvider;
    }
}
