<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetDismantleOrder;

/**
 * AssetDismantleOrderSearch represents the model behind the search form of `backend\models\AssetDismantleOrder`.
 */
class AssetDismantleOrderSearch extends AssetDismantleOrder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_dismantle_order', 'id_supervisor', 'id_job_class', 'order_increment', 'year', 'id_asset_item', 'id_customer', 'created_id_user'], 'integer'],
            [['type_order', 'order_date', 'order_number', 'notes', 'created_date', 'created_ip_address', 'alamat_customer'], 'safe'],
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
        $query = AssetDismantleOrder::find();

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
            'id_asset_dismantle_order' => $this->id_asset_dismantle_order,
            'id_supervisor' => $this->id_supervisor,
            'id_job_class' => $this->id_job_class,
            'order_date' => $this->order_date,
            'order_increment' => $this->order_increment,
            'year' => $this->year,
            'id_asset_item' => $this->id_asset_item,
            'id_customer' => $this->id_customer,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
        ]);

        $query->andFilterWhere(['like', 'type_order', $this->type_order])
            ->andFilterWhere(['like', 'order_number', $this->order_number])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'alamat_customer', $this->alamat_customer])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
