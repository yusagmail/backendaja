<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MrpProjectProductItem;

/**
 * MrpProjectProductItemSearch represents the model behind the search form of `backend\models\MrpProjectProductItem`.
 */
class MrpProjectProductItemSearch extends MrpProjectProductItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mrp_project_product_item', 'id_mrp_project', 'id_mst_product_component'], 'integer'],
            [['plan_start_date', 'plan_end_date', 'actual_start_date', 'actual_end_date'], 'safe'],
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
        $query = MrpProjectProductItem::find();

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
            'id_mrp_project_product_item' => $this->id_mrp_project_product_item,
            'id_mrp_project' => $this->id_mrp_project,
            'id_mst_product_component' => $this->id_mst_product_component,
            'plan_start_date' => $this->plan_start_date,
            'plan_end_date' => $this->plan_end_date,
            'actual_start_date' => $this->actual_start_date,
            'actual_end_date' => $this->actual_end_date,
        ]);

        return $dataProvider;
    }

    public function searchGroupByProduct($params)
    {
        $query = MrpProjectProductItem::find();
        $query->select('id_mst_product_component, SUM(quantity) as total_quantity');
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
            //'id_mrp_project_product_item' => $this->id_mrp_project_product_item,
            'id_mrp_project' => $this->id_mrp_project,
            'id_mst_product_component' => $this->id_mst_product_component,
            'plan_start_date' => $this->plan_start_date,
            'plan_end_date' => $this->plan_end_date,
            'actual_start_date' => $this->actual_start_date,
            'actual_end_date' => $this->actual_end_date,
        ]);

        $query->groupBy('id_mst_product_component');

        return $dataProvider;
    }
}
