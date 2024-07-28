<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetItemLocationUnit;

/**
 * AssetItemLocationUnitSearch represents the model behind the search form of `backend\models\AssetItemLocationUnit`.
 */
class AssetItemLocationUnitSearch extends AssetItemLocationUnit
{
    public $assetMasterName;
    public $assetItemName;
    public $locationName;
    public $locationUnitName;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item_location_unit', 'id_asset_master', 'id_asset_item', 'id_location', 'id_location_unit'], 'integer'],
            [['keterangan', 'assetMasterName', 'assetItemName', 'locationName', 'locationUnitName'], 'safe'],
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
        $query = AssetItemLocationUnit::find()
            ->joinWith(['assetMaster', 'assetItem', 'location', 'locationUnit']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Enable sorting for related fields
        $dataProvider->sort->attributes['assetMasterName'] = [
            'asc' => ['asset_master.asset_name' => SORT_ASC],
            'desc' => ['asset_master.asset_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['assetItemName'] = [
            'asc' => ['asset_item.asset_name' => SORT_ASC],
            'desc' => ['asset_item.asset_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['locationName'] = [
            'asc' => ['location.location_name' => SORT_ASC],
            'desc' => ['location.location_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['locationUnitName'] = [
            'asc' => ['location_unit.location_unit_name' => SORT_ASC],
            'desc' => ['location_unit.location_unit_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'asset_item_location_unit.id_asset_item_location_unit' => $this->id_asset_item_location_unit,
            'asset_item_location_unit.id_asset_master' => $this->id_asset_master,
            'asset_item_location_unit.id_asset_item' => $this->id_asset_item,
            'asset_item_location_unit.id_location' => $this->id_location,
            'asset_item_location_unit.id_location_unit' => $this->id_location_unit,
        ]);

        $query->andFilterWhere(['like', 'asset_item_location_unit.keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'asset_master.asset_name', $this->assetMasterName])
            ->andFilterWhere(['like', 'asset_item.asset_name', $this->assetItemName])
            ->andFilterWhere(['like', 'location.location_name', $this->locationName])
            ->andFilterWhere(['like', 'location_unit.location_unit_name', $this->locationUnitName]);

        return $dataProvider;
    }
}
