<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PickingListItem;

/**
 * PickingListItemSearch represents the model behind the search form of `backend\models\PickingListItem`.
 */
class PickingListItemSearch extends PickingListItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_picking_list_item', 'id_picking_list', 'id_gudang', 'qty', 'created_user_id'], 'integer'],
            [['item_id', 'item_name', 'size', 'location', 'unit', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = PickingListItem::find();

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
            'id_picking_list_item' => $this->id_picking_list_item,
            'id_picking_list' => $this->id_picking_list,
            'id_gudang' => $this->id_gudang,
            'qty' => $this->qty,
            'created_date' => $this->created_date,
            'created_user_id' => $this->created_user_id,
        ]);

        $query->andFilterWhere(['like', 'item_id', $this->item_id])
            ->andFilterWhere(['like', 'item_name', $this->item_name])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
