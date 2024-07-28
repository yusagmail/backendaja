<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SupplierDoItem;

/**
 * SupplierDoItemSearch represents the model behind the search form of `backend\models\SupplierDoItem`.
 */
class SupplierDoItemSearch extends SupplierDoItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_supplier_do_item', 'id_supplier_delivery_order', 'id_material', 'qty', 'created_user_id'], 'integer'],
            [['varian', 'keterangan', 'created_date', 'created_ip_address'], 'safe'],
            [['unit_price', 'total_price'], 'number'],
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
        $query = SupplierDoItem::find();

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
            'id_supplier_do_item' => $this->id_supplier_do_item,
            'id_supplier_delivery_order' => $this->id_supplier_delivery_order,
            'id_material' => $this->id_material,
            'qty' => $this->qty,
            'unit_price' => $this->unit_price,
            'total_price' => $this->total_price,
            'created_date' => $this->created_date,
            'created_user_id' => $this->created_user_id,
        ]);

        $query->andFilterWhere(['like', 'varian', $this->varian])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
