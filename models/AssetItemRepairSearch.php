<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AssetItemRepairSearch represents the model behind the search form of `backend\models\AssetItemRepair`.
 */
class AssetItemRepairSearch extends AssetItemRepair
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item_repair', 'id_asset_item', 'id_asset_item_incident', 'id_vendor', 'estimated_day', 'status_repair'], 'integer'],
            [['repair_date', 'carried_to_vendor_by', 'repair_finish_date', 'received_date', 'received_user', 'repair_info', 'sparepart_changes_info', 'last_condition_report'], 'safe'],
            [['repair_cost'], 'number'],
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
        $query = AssetItemRepair::find();

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
            'id_asset_item_repair' => $this->id_asset_item_repair,
            'id_asset_item' => $this->id_asset_item,
            'id_asset_item_incident' => $this->id_asset_item_incident,
            'repair_date' => $this->repair_date,
            'id_vendor' => $this->id_vendor,
            'estimated_day' => $this->estimated_day,
            'status_repair' => $this->status_repair,
            'repair_finish_date' => $this->repair_finish_date,
            'repair_cost' => $this->repair_cost,
            'received_date' => $this->received_date,
        ]);

        $query->andFilterWhere(['like', 'carried_to_vendor_by', $this->carried_to_vendor_by])
            ->andFilterWhere(['like', 'received_user', $this->received_user])
            ->andFilterWhere(['like', 'repair_info', $this->repair_info])
            ->andFilterWhere(['like', 'sparepart_changes_info', $this->sparepart_changes_info])
            ->andFilterWhere(['like', 'last_condition_report', $this->last_condition_report]);

        return $dataProvider;
    }
    public static function getTotalAssetReport(){
		$val = 0;
		$val = AssetItemRepair::find()
			//->where(['status_active' => 1])
			->count();

        return $val;
    }

    public static function getTotalAssetHandle(){
		$val = 0;
		$val = AssetItemRepair::find()
			//->where(['status_active' => 1])
			->count();

        return $val;
    }
    public static function getTotalAssetFollowup(){
		$val = 0;
		$val = AssetItemRepair::find()
			//->where(['status_active' => 1])
			->count();

        return $val;
    }
    public static function getTotalAssetTodayReport(){
		$val = 0;
		$val = AssetItemRepair::find()
			//->where(['status_active' => 1])
			->count();

        return $val;
    }
    public static function getTotalBottom(){
		$val = 0;
		$val = AssetItemRepair::find()
			//->where(['status_active' => 1])
			->count();

        return $val;
    }
    public static function getHandleBottom(){
		$val = 0;
		$val = AssetItemRepair::find()
			//->where(['status_active' => 1])
			->count();

        return $val;
    }
    public static function getFollowupBottom(){
		$val = 0;
		$val = AssetItemRepair::find()
			//->where(['status_active' => 1])
			->count();

        return $val;
    }
}
