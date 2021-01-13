<?php

namespace common\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form of `common\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UserId', 'IdPriv', 'Login'], 'integer'],
            [['Username', 'Authkey', 'Password', 'PasswordResetToken', 'Email', 'LastLogin', 'IdM', 'LastIP'], 'safe'],
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
        $query = User::find();

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
            'UserId' => $this->UserId,
            'IdPriv' => $this->IdPriv,
            'Login' => $this->Login,
            'LastLogin' => $this->LastLogin,
        ]);

        $query->andFilterWhere(['like', 'Username', $this->Username])
            ->andFilterWhere(['like', 'Authkey', $this->Authkey])
            ->andFilterWhere(['like', 'Password', $this->Password])
            ->andFilterWhere(['like', 'PasswordResetToken', $this->PasswordResetToken])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'IdM', $this->IdM])
			 ->andFilterWhere(['like', 'LastIP', $this->LastIP]);

        return $dataProvider;
    }
}
