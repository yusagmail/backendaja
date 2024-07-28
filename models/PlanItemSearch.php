<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PlanItem;

/**
 * PlanItemSearch represents the model behind the search form of `backend\models\PlanItem`.
 */
class PlanItemSearch extends PlanItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_plan_item', 'id_plan', 'id_defecta_details', 'stok', 'cost', 'total_cost', 'sales', 'total_sales'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
        $query = PlanItem::find();

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
            'id_plan_item' => $this->id_plan_item,
            'id_plan' => $this->id_plan,
            'id_defecta_details' => $this->id_defecta_details,
            'stok' => $this->stok,
            'cost' => $this->cost,
            'total_cost' => $this->total_cost,
            'sales' => $this->sales,
            'total_sales' => $this->total_sales,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
