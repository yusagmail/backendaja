<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Defecta;

/**
 * DefectaSearch represents the model behind the search form of `backend\models\Defecta`.
 */
class DefectaSearch extends Defecta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_defecta', 'id_user', 'month', 'year', 'id_gudang'], 'integer'],
            [['title', 'request_date', 'created_at', 'updated_at'], 'safe'],
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
        $query = Defecta::find();

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
            'id_defecta' => $this->id_defecta,
            'id_user' => $this->id_user,
            'request_date' => $this->request_date,
            'month' => $this->month,
            'year' => $this->year,
            'id_gudang' => $this->id_gudang,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
