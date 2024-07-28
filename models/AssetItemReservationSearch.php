<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetItemReservation;

/**
 * AssetItemReservationSearch represents the model behind the search form of `backend\models\AssetItemReservation`.
 */
class AssetItemReservationSearch extends AssetItemReservation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item_reservation', 'id_asset_item', 'reservation_id_user'], 'integer'],
            [['event_date', 'start_time', 'end_time', 'event_name', 'description', 'pic', 'reservation_time', 'reservation_name', 'reservation_ip_address', 'reservation_phone'], 'safe'],
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
        $query = AssetItemReservation::find();

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
            'id_asset_item_reservation' => $this->id_asset_item_reservation,
            'id_asset_item' => $this->id_asset_item,
            'event_date' => $this->event_date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'reservation_time' => $this->reservation_time,
            'reservation_id_user' => $this->reservation_id_user,
        ]);

        $query->andFilterWhere(['like', 'event_name', $this->event_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'pic', $this->pic])
            ->andFilterWhere(['like', 'reservation_name', $this->reservation_name])
            ->andFilterWhere(['like', 'reservation_ip_address', $this->reservation_ip_address])
            ->andFilterWhere(['like', 'reservation_phone', $this->reservation_phone]);

        return $dataProvider;
    }
}
