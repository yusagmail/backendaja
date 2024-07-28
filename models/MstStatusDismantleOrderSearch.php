<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MstStatusDismantleOrder;

/**
 * MstStatusDismantleOrderSearch represents the model behind the search form of `backend\models\MstStatusDismantleOrder`.
 */
class MstStatusDismantleOrderSearch extends MstStatusDismantleOrder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_status_dismantle_order'], 'integer'],
            [['status_dismantle_order'], 'safe'],
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
        $query = MstStatusDismantleOrder::find();

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
            'id_mst_status_dismantle_order' => $this->id_mst_status_dismantle_order,
        ]);

        $query->andFilterWhere(['like', 'status_dismantle_order', $this->status_dismantle_order]);

        return $dataProvider;
    }
}
