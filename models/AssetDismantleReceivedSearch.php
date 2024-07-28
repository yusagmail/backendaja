<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetDismantleReceived;

/**
 * AssetDismantleReceivedSearch represents the model behind the search form of `backend\models\AssetDismantleReceived`.
 */
class AssetDismantleReceivedSearch extends AssetDismantleReceived
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_dismantle_received', 'id_asset_dismantle_order', 'id_warehouse', 'is_approved', 'approval_user_id'], 'integer'],
            [['received_date', 'notes', 'approval_date', 'approval_ip_address'], 'safe'],
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
        $query = AssetDismantleReceived::find();

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
            'id_asset_dismantle_received' => $this->id_asset_dismantle_received,
            'id_asset_dismantle_order' => $this->id_asset_dismantle_order,
            'id_warehouse' => $this->id_warehouse,
            'received_date' => $this->received_date,
            'is_approved' => $this->is_approved,
            'approval_user_id' => $this->approval_user_id,
            'approval_date' => $this->approval_date,
        ]);

        $query->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'approval_ip_address', $this->approval_ip_address]);

        return $dataProvider;
    }
}
