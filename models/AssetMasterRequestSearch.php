<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssetMasterRequest;

/**
 * AssetMasterRequestSearch represents the model behind the search form of `backend\models\AssetMasterRequest`.
 */
class AssetMasterRequestSearch extends AssetMasterRequest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_asset_master_request', 'id_asset_master', 'requested_user_id'], 'integer'],
            [['request_date', 'request_datetime', 'request_notes', 'requested_by', 'requested_ip_address'], 'safe'],
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
        $query = AssetMasterRequest::find()->indexBy('id_asset_master_request');

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
            'id_asset_master_request' => $this->id_asset_master_request,
            'id_asset_master' => $this->id_asset_master,
            'request_date' => $this->request_date,
            'request_datetime' => $this->request_datetime,
            'requested_user_id' => $this->requested_user_id,
        ]);

        $query->andFilterWhere(['like', 'request_notes', $this->request_notes])
            ->andFilterWhere(['like', 'requested_by', $this->requested_by])
            ->andFilterWhere(['like', 'requested_ip_address', $this->requested_ip_address]);

        return $dataProvider;
    }
}
