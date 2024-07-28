<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetReceivedToItem;

/**
 * AssetReceivedToItemSearch represents the model behind the search form of `backend\models\AssetReceivedToItem`.
 */
class AssetReceivedToItemSearch extends AssetReceivedToItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_received_to_item', 'id_asset_received', 'id_asset_item', 'created_user'], 'integer'],
            [['created_date', 'created_ip_address'], 'safe'],
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
        $query = AssetReceivedToItem::find();

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
            'id_asset_received_to_item' => $this->id_asset_received_to_item,
            'id_asset_received' => $this->id_asset_received,
            'id_asset_item' => $this->id_asset_item,
            'created_user' => $this->created_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
