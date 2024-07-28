<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AuthRoleName;

/**
 * AuthRoleNameSearch represents the model behind the search form of `backend\models\AuthRoleName`.
 */
class AuthRoleNameSearch extends AuthRoleName
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_auth_role_name', 'as_generic_choice'], 'integer'],
            [['auth_item_name', 'role_name'], 'safe'],
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
        $query = AuthRoleName::find();

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
            'id_auth_role_name' => $this->id_auth_role_name,
            'as_generic_choice' => $this->as_generic_choice,
        ]);

        $query->andFilterWhere(['like', 'auth_item_name', $this->auth_item_name])
            ->andFilterWhere(['like', 'role_name', $this->role_name]);

        return $dataProvider;
    }
}
