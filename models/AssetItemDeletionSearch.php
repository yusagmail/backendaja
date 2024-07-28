<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetItemDeletion;

/**
 * AssetItemDeletionSearch represents the model behind the search form of `backend\models\AssetItemDeletion`.
 */
class AssetItemDeletionSearch extends AssetItemDeletion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_item_deletion', 'id_asset_item', 'execution_month', 'execution_year', 'execution_id_user', 'id_mst_status_condition'], 'integer'],
            [['status_deletion', 'execution_date', 'execution_user', 'condition_when_deletion', 'acquisition_by', 'grant_to', 'photo1', 'photo2', 'notes'], 'safe'],
            [['income'], 'number'],
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
        $query = AssetItemDeletion::find();

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
            'id_asset_item_deletion' => $this->id_asset_item_deletion,
            'id_asset_item' => $this->id_asset_item,
            'execution_date' => $this->execution_date,
            'execution_month' => $this->execution_month,
            'execution_year' => $this->execution_year,
            'execution_id_user' => $this->execution_id_user,
            'income' => $this->income,
            'id_mst_status_condition' => $this->id_mst_status_condition,
        ]);

        $query->andFilterWhere(['like', 'status_deletion', $this->status_deletion])
            ->andFilterWhere(['like', 'execution_user', $this->execution_user])
            ->andFilterWhere(['like', 'condition_when_deletion', $this->condition_when_deletion])
            ->andFilterWhere(['like', 'acquisition_by', $this->acquisition_by])
            ->andFilterWhere(['like', 'grant_to', $this->grant_to])
            ->andFilterWhere(['like', 'photo1', $this->photo1])
            ->andFilterWhere(['like', 'photo2', $this->photo2])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
