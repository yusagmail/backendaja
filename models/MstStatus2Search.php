<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * MstStatus2Search represents the model behind the search form of `backend\models\MstStatus2`.
 */
class MstStatus2Search extends MstStatus2
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_status', 'is_active'], 'integer'],
            [['mst_status', 'description'], 'safe'],
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
        $query = MstStatus2::find();

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
            'id_mst_status' => $this->id_mst_status,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'mst_status', $this->mst_status])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
