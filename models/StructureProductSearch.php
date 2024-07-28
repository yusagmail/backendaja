<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\StructureProduct;

/**
 * StructureProductSearch represents the model behind the search form of `backend\models\StructureProduct`.
 */
class StructureProductSearch extends StructureProduct
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_structure_product', 'result_id_mst_product_component', 'id_mrp_project', 'level', 'id_job'], 'integer'],
            [['duration'], 'number'],
            [['remarks'], 'safe'],
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
        $query = StructureProduct::find();

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
            'id_structure_product' => $this->id_structure_product,
            'result_id_mst_product_component' => $this->result_id_mst_product_component,
            'id_mrp_project' => $this->id_mrp_project,
            'level' => $this->level,
            'id_job' => $this->id_job,
            'duration' => $this->duration,
        ]);

        $query->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
