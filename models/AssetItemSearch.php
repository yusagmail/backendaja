<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AssetItemSearch represents the model behind the search form of `backend\models\AssetItem`.
 */
class AssetItemSearch extends AssetItem
{
    public $id_propinsi;
    public $id_kelurahan;
    public $id_kecamatan;
    public $id_kabupaten;
    public $bukti_kepemilikan;
    public $id_location;
    public $id_location_unit;

   /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item', 'id_asset_master', 'id_asset_received', 'id_asset_item_location',
                'id_type_asset_item1', 'id_type_asset_item2', 'id_type_asset_item3', 'id_type_asset_item4',
                'id_type_asset_item5', 'id_location', 'id_location_unit'], 'integer'],
            [['number1', 'number2', 'number3', 'picture1', 'picture2', 'picture3', 'id_kabupaten', 'id_kecamatan', 'id_kelurahan', 'bukti_kepemilikan'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getTotalAsset() {
      return AssetItem::find()->count();
    }
    public static function getTotalAssetGodCondition() {
      
      return AssetItem::find()->count();
    }
    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = AssetItem::find()->alias('ai')->joinWith('assetItemLocation ail');
    
        // add conditions that should always apply here
    
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    
        $this->load($params);
    
        if (!$this->validate()) {
            return $dataProvider;
        }
    
        // grid filtering conditions
        $query->andFilterWhere([
            'ai.id_asset_item' => $this->id_asset_item,
            'ai.id_asset_master' => $this->id_asset_master, // specify alias here
            'ai.id_asset_received' => $this->id_asset_received,
            'ail.id_location' => $this->id_location,
            'ail.id_location_unit' => $this->id_location_unit,
            'ai.id_type_asset_item1' => $this->id_type_asset_item1,
            'ai.id_type_asset_item2' => $this->id_type_asset_item2,
            'ai.id_type_asset_item3' => $this->id_type_asset_item3,
            'ai.id_type_asset_item4' => $this->id_type_asset_item4,
            'ai.id_type_asset_item5' => $this->id_type_asset_item5,
        ]);
    
        $query->andFilterWhere(['like', 'ai.number1', $this->number1])
            ->andFilterWhere(['like', 'ai.number2', $this->number2])
            ->andFilterWhere(['like', 'ai.number3', $this->number3])
            ->andFilterWhere(['like', 'ai.picture1', $this->picture1])
            ->andFilterWhere(['like', 'ai.picture2', $this->picture2])
            ->andFilterWhere(['like', 'ai.picture3', $this->picture3])
            ->andFilterWhere(['like', 'ai.label1', $this->label1])
            ->andFilterWhere(['like', 'ai.label2', $this->label2])
            ->andFilterWhere(['like', 'ai.label3', $this->label3])
            ->andFilterWhere(['like', 'ai.label4', $this->label4])
            ->andFilterWhere(['like', 'ai.label5', $this->label5])
            ->andFilterWhere(['like', 'ail.keterangan1', $this->bukti_kepemilikan])
            ->andFilterWhere(['like', 'ail.id_propinsi', $this->id_propinsi])
            ->andFilterWhere(['like', 'ail.id_kelurahan', $this->id_kelurahan])
            ->andFilterWhere(['like', 'ail.id_kecamatan', $this->id_kecamatan])
            ->andFilterWhere(['like', 'ail.id_kabupaten', $this->id_kabupaten]);
    
        return $dataProvider;
    }
    

    public function searchSimple($params)
    {
        $query = AssetItem::find();
        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_asset_item' => $this->id_asset_item,
            'id_asset_master' => $this->id_asset_master,
            'id_asset_received' => $this->id_asset_received,
            'asset_item.id_asset_item_location' => $this->id_asset_item_location,
            'id_type_asset_item1' => $this->id_type_asset_item1,
            'id_type_asset_item2' => $this->id_type_asset_item2,
            'id_type_asset_item3' => $this->id_type_asset_item3,
            'id_type_asset_item4' => $this->id_type_asset_item4,
            'id_type_asset_item5' => $this->id_type_asset_item5,
        ]);

        $query->andFilterWhere(['=', 'number1', $this->number1])
            ->andFilterWhere(['like', 'number2', $this->number2])
            ->andFilterWhere(['like', 'number3', $this->number3])
            ->andFilterWhere(['like', 'picture1', $this->picture1])
            ->andFilterWhere(['like', 'picture2', $this->picture2])
            ->andFilterWhere(['like', 'picture3', $this->picture3])
            ->andFilterWhere(['like', 'label1', $this->label1])
            ->andFilterWhere(['like', 'label2', $this->label2])
            ->andFilterWhere(['like', 'label3', $this->label3])
            ->andFilterWhere(['like', 'label4', $this->label4])
            ->andFilterWhere(['like', 'label5', $this->label5])
            ->andFilterWhere(['like', 'asset_item_location.keterangan1', $this->bukti_kepemilikan])
            ->andFilterWhere(['like', 'asset_item_location.id_propinsi', $this->id_propinsi])
            ->andFilterWhere(['like', 'asset_item_location.id_kelurahan', $this->id_kelurahan])
            ->andFilterWhere(['like', 'asset_item_location.id_kecamatan', $this->id_kecamatan])
            ->andFilterWhere(['like', 'asset_item_location.id_kabupaten', $this->id_kabupaten]);

        return $dataProvider;
    }
}
