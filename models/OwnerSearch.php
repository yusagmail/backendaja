<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * OwnerSearch represents the model behind the search form of `backend\models\Owner`.
 */
class OwnerSearch extends Owner
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_owner'], 'integer'],
            [['name', 'card_number', 'place_of_birth', 'date_of_birth', 'address', 'profession', 'file1', 'file2', 'file3'], 'safe'],
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
        $query = Owner::find();

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
            'id_owner' => $this->id_owner,
            'date_of_birth' => $this->date_of_birth,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'card_number', $this->card_number])
            ->andFilterWhere(['like', 'place_of_birth', $this->place_of_birth])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'profession', $this->profession])
            ->andFilterWhere(['like', 'file1', $this->file1])
            ->andFilterWhere(['like', 'file2', $this->file2])
            ->andFilterWhere(['like', 'file3', $this->file3]);

        return $dataProvider;
    }
}
