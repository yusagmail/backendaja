<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\StockOpnameStatus;

/**
 * StockOpnameStatusSearch represents the model behind the search form of `backend\models\StockOpnameStatus`.
 */
class StockOpnameStatusSearch extends StockOpnameStatus
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_stock_opname_status', 'id_stock_opname', 'id_gudang', 'created_user_id', 'modified_id_user'], 'integer'],
            [['status', 'tgl_dibuat', 'waktu_mulai', 'waktu_terakhir', 'created_date', 'created_ip_address', 'modified_date', 'modified_ip_address'], 'safe'],
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
        $query = StockOpnameStatus::find();

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
            'id_stock_opname_status' => $this->id_stock_opname_status,
            'id_stock_opname' => $this->id_stock_opname,
            'id_gudang' => $this->id_gudang,
            'tgl_dibuat' => $this->tgl_dibuat,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_terakhir' => $this->waktu_terakhir,
            'created_date' => $this->created_date,
            'created_user_id' => $this->created_user_id,
            'modified_date' => $this->modified_date,
            'modified_id_user' => $this->modified_id_user,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address])
            ->andFilterWhere(['like', 'modified_ip_address', $this->modified_ip_address]);

        return $dataProvider;
    }
}
