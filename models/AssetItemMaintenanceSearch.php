<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetItemMaintenance;

/**
 * AssetItemMaintenanceSearch represents the model behind the search form of `backend\models\AssetItemMaintenance`.
 */
class AssetItemMaintenanceSearch extends AssetItemMaintenance
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item_maintenance', 'id_asset_item', 'id_asset_master_criteria_maintenance', 'id_vendor', 'estimated_day', 'status_maintenance'], 'integer'],
            [['last_primer_value', 'maintenance_cost'], 'number'],
            [['maintenance_date', 'carried_to_vendor_by', 'maintenance_finish_date', 'received_date', 'received_user', 'maintenance_info', 'sparepart_changes_info', 'last_condition_report'], 'safe'],
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
        $query = AssetItemMaintenance::find();

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
            'id_asset_item_maintenance' => $this->id_asset_item_maintenance,
            'id_asset_item' => $this->id_asset_item,
            'id_asset_master_criteria_maintenance' => $this->id_asset_master_criteria_maintenance,
            'last_primer_value' => $this->last_primer_value,
            'maintenance_date' => $this->maintenance_date,
            'id_vendor' => $this->id_vendor,
            'estimated_day' => $this->estimated_day,
            'status_maintenance' => $this->status_maintenance,
            'maintenance_finish_date' => $this->maintenance_finish_date,
            'maintenance_cost' => $this->maintenance_cost,
            'received_date' => $this->received_date,
        ]);

        $query->andFilterWhere(['like', 'carried_to_vendor_by', $this->carried_to_vendor_by])
            ->andFilterWhere(['like', 'received_user', $this->received_user])
            ->andFilterWhere(['like', 'maintenance_info', $this->maintenance_info])
            ->andFilterWhere(['like', 'sparepart_changes_info', $this->sparepart_changes_info])
            ->andFilterWhere(['like', 'last_condition_report', $this->last_condition_report]);

        return $dataProvider;
    }
}
