<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MrpProject;

/**
 * MrpProjectSearch represents the model behind the search form of `backend\models\MrpProject`.
 */
class MrpProjectSearch extends MrpProject
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mrp_project', 'id_customer', 'is_internal_order', 'is_main_order', 'actual_start_date', 'actual_end_date'], 'integer'],
            [['project_name', 'remark', 'plan_start_date', 'plan_end_date'], 'safe'],
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
        $query = MrpProject::find();

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
            'id_mrp_project' => $this->id_mrp_project,
            'id_customer' => $this->id_customer,
            'is_internal_order' => $this->is_internal_order,
            'is_main_order' => $this->is_main_order,
            'plan_start_date' => $this->plan_start_date,
            'plan_end_date' => $this->plan_end_date,
            'actual_start_date' => $this->actual_start_date,
            'actual_end_date' => $this->actual_end_date,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
