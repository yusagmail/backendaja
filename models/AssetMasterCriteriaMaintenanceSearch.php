<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetMasterCriteriaMaintenance;

/**
 * AssetMasterCriteriaMaintenanceSearch represents the model behind the search form of `backend\models\AssetMasterCriteriaMaintenance`.
 */
class AssetMasterCriteriaMaintenanceSearch extends AssetMasterCriteriaMaintenance
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_master_criteria_maintenance', 'id_asset_master', 'type_criteria', 'metric'], 'integer'],
            [['criteria', 'notes'], 'safe'],
            [['periodic_value'], 'number'],
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
        $query = AssetMasterCriteriaMaintenance::find();

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
            'id_asset_master_criteria_maintenance' => $this->id_asset_master_criteria_maintenance,
            'id_asset_master' => $this->id_asset_master,
            'type_criteria' => $this->type_criteria,
            'periodic_value' => $this->periodic_value,
            'metric' => $this->metric,
        ]);

        $query->andFilterWhere(['like', 'criteria', $this->criteria])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
