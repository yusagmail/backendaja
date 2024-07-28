<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetMasterMapYear;

/**
 * AssetMasterMapYearSearch represents the model behind the search form of `backend\models\AssetMasterMapYear`.
 */
class AssetMasterMapYearSearch extends AssetMasterMapYear
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_master_map_year', 'id_asset_master', 'year', 'current_count', 'total_need', 'updated_user'], 'integer'],
            [['updated_date', 'updated_ip_address'], 'safe'],
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
        $query = AssetMasterMapYear::find();

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
            'id_asset_master_map_year' => $this->id_asset_master_map_year,
            'id_asset_master' => $this->id_asset_master,
            'year' => $this->year,
            'current_count' => $this->current_count,
            'total_need' => $this->total_need,
            'updated_date' => $this->updated_date,
            'updated_user' => $this->updated_user,
        ]);

        $query->andFilterWhere(['like', 'updated_ip_address', $this->updated_ip_address]);

        return $dataProvider;
    }
}
