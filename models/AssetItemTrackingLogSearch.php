<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetItemTrackingLog;

/**
 * AssetItemTrackingLogSearch represents the model behind the search form of `backend\models\AssetItemTrackingLog`.
 */
class AssetItemTrackingLogSearch extends AssetItemTrackingLog
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item_tracking_log', 'id_asset_item', 'id_device_tracking'], 'integer'],
            [['log_date', 'log_datetime', 'device_logtime', 'longitude', 'latitude', 'full_message'], 'safe'],
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
        $query = AssetItemTrackingLog::find();

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
            'id_asset_item_tracking_log' => $this->id_asset_item_tracking_log,
            'id_asset_item' => $this->id_asset_item,
            'id_device_tracking' => $this->id_device_tracking,
            'log_date' => $this->log_date,
            'log_datetime' => $this->log_datetime,
            'device_logtime' => $this->device_logtime,
        ]);

        $query->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'full_message', $this->full_message]);

        return $dataProvider;
    }
}
