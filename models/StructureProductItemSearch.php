<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\StructureProductItem;

/**
 * StructureProductItemSearch represents the model behind the search form of `backend\models\StructureProductItem`.
 */
class StructureProductItemSearch extends StructureProductItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_structure_product_item', 'id_structure_product', 'item_id_mst_product_component', 'quantity', 'id_satuan'], 'integer'],
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
        $query = StructureProductItem::find();

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
            'id_structure_product_item' => $this->id_structure_product_item,
            'id_structure_product' => $this->id_structure_product,
            'item_id_mst_product_component' => $this->item_id_mst_product_component,
            'quantity' => $this->quantity,
            'id_satuan' => $this->id_satuan,
        ]);

        return $dataProvider;
    }
}
