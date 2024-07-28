<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Reports;

/**
 * ReportsSearch represents the model behind the search form of `backend\models\Reports`.
 */
class ReportsSearch extends Reports
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'phenomenon_id', 'user_id', 'village_id', 'status'], 'integer'],
            [['description', 'file', 'lat', 'long', 'referensi', 'created_at', 'updated_at', 'date'], 'safe'],
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
        $query = Reports::find();

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
            'id' => $this->id,
            'phenomenon_id' => $this->phenomenon_id,
            'user_id' => $this->user_id,
            'village_id' => $this->village_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'long', $this->long])
            ->andFilterWhere(['like', 'referensi', $this->referensi]);

        return $dataProvider;
    }
}
