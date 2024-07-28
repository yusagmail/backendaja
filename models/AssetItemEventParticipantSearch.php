<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetItemEventParticipant;

/**
 * AssetItemEventParticipantSearch represents the model behind the search form of `backend\models\AssetItemEventParticipant`.
 */
class AssetItemEventParticipantSearch extends AssetItemEventParticipant
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item_event_participant', 'id_user', 'is_confirm_present', 'is_present', 'has_print_certificate'], 'integer'],
            [['id_asset_item_event', 'participant_type', 'participant_name', 'participant_affiliation', 'participant_phone', 'participant_email', 'participant_position', 'checkin_time', 'checkout_time'], 'safe'],
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
        $query = AssetItemEventParticipant::find();

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
            'id_asset_item_event_participant' => $this->id_asset_item_event_participant,
            'id_user' => $this->id_user,
            'is_confirm_present' => $this->is_confirm_present,
            'is_present' => $this->is_present,
            'checkin_time' => $this->checkin_time,
            'checkout_time' => $this->checkout_time,
            'has_print_certificate' => $this->has_print_certificate,
        ]);

        $query->andFilterWhere(['like', 'id_asset_item_event', $this->id_asset_item_event])
            ->andFilterWhere(['like', 'participant_type', $this->participant_type])
            ->andFilterWhere(['like', 'participant_name', $this->participant_name])
            ->andFilterWhere(['like', 'participant_affiliation', $this->participant_affiliation])
            ->andFilterWhere(['like', 'participant_phone', $this->participant_phone])
            ->andFilterWhere(['like', 'participant_email', $this->participant_email])
            ->andFilterWhere(['like', 'participant_position', $this->participant_position]);

        return $dataProvider;
    }
}
