<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AccountCode;

/**
 * AccountCodeSearch represents the model behind the search form of `backend\models\AccountCode`.
 */
class AccountCodeSearch extends AccountCode
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_account_code', 'id_account_code_parent'], 'integer'],
            [['account_code', 'account_name'], 'safe'],
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
        $query = AccountCode::find();

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
            'id_account_code' => $this->id_account_code,
            'id_account_code_parent' => $this->id_account_code_parent,
        ]);

        $query->andFilterWhere(['like', 'account_code', $this->account_code])
            ->andFilterWhere(['like', 'account_name', $this->account_name]);

        return $dataProvider;
    }
}
