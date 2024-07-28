<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetItemTrackingDevice;

/**
 * AssetItemTrackingDeviceSearch represents the model behind the search form of `backend\models\AssetItemTrackingDevice`.
 */
class AssetItemTrackingDeviceSearch extends AssetItemTrackingDevice
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item_tracking_device', 'id_asset_master', 'id_device', 'status_active'], 'integer'],
            [['installed_date', 'installed_by', 'notes'], 'safe'],
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
        $query = AssetItemTrackingDevice::find();

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
            'id_asset_item_tracking_device' => $this->id_asset_item_tracking_device,
            'id_asset_master' => $this->id_asset_master,
            'id_device' => $this->id_device,
            'installed_date' => $this->installed_date,
            'status_active' => $this->status_active,
        ]);

        $query->andFilterWhere(['like', 'installed_by', $this->installed_by])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
