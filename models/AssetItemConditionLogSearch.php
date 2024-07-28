<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetItemConditionLog;

/**
 * AssetItemConditionLogSearch represents the model behind the search form of `backend\models\AssetItemConditionLog`.
 */
class AssetItemConditionLogSearch extends AssetItemConditionLog
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item_condition_log', 'id_asset_item', 'id_mst_status_condition', 'reported_user_id', 'photo1'], 'integer'],
            [['condition_log_date', 'condition_log_datetime', 'condition_log_notes', 'reported_by', 'reported_ip_address'], 'safe'],
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
        $query = AssetItemConditionLog::find();

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
            'id_asset_item_condition_log' => $this->id_asset_item_condition_log,
            'id_asset_item' => $this->id_asset_item,
            'id_mst_status_condition' => $this->id_mst_status_condition,
            'condition_log_date' => $this->condition_log_date,
            'condition_log_datetime' => $this->condition_log_datetime,
            'reported_user_id' => $this->reported_user_id,
            'photo1' => $this->photo1,
        ]);

        $query->andFilterWhere(['like', 'condition_log_notes', $this->condition_log_notes])
            ->andFilterWhere(['like', 'reported_by', $this->reported_by])
            ->andFilterWhere(['like', 'reported_ip_address', $this->reported_ip_address]);

        return $dataProvider;
    }
}
