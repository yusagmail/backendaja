<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetItemDistributionCurrent;

/**
 * AssetItemDistributionCurrentSearch represents the model behind the search form of `backend\models\AssetItemDistributionCurrent`.
 */
class AssetItemDistributionCurrentSearch extends AssetItemDistributionCurrent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item_distribution_current', 'id_asset_item', 'id_pegawai', 'id_departement', 'id_asset_item_location', 'start_month', 'start_year', 'id_mst_status_condition'], 'integer'],
            [['distribute_to', 'status', 'start_date', 'duration', 'handover_by', 'handover_condition_notes', 'handover_photos1', 'handover_photos2', 'notes'], 'safe'],
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
        $query = AssetItemDistributionCurrent::find();

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
            'id_asset_item_distribution_current' => $this->id_asset_item_distribution_current,
            'id_asset_item' => $this->id_asset_item,
            'id_pegawai' => $this->id_pegawai,
            'id_departement' => $this->id_departement,
            'id_asset_item_location' => $this->id_asset_item_location,
            'start_date' => $this->start_date,
            'start_month' => $this->start_month,
            'start_year' => $this->start_year,
            'id_mst_status_condition' => $this->id_mst_status_condition,
        ]);

        $query->andFilterWhere(['like', 'distribute_to', $this->distribute_to])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'duration', $this->duration])
            ->andFilterWhere(['like', 'handover_by', $this->handover_by])
            ->andFilterWhere(['like', 'handover_condition_notes', $this->handover_condition_notes])
            ->andFilterWhere(['like', 'handover_photos1', $this->handover_photos1])
            ->andFilterWhere(['like', 'handover_photos2', $this->handover_photos2])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
