<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\StockOpname;

/**
 * StockOpnameSearch represents the model behind the search form of `backend\models\StockOpname`.
 */
class StockOpnameSearch extends StockOpname
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_stock_opname', 'created_user_id'], 'integer'],
            [['tanggal_stock_opname', 'nama_kegiatan', 'keterangan', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = StockOpname::find();

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
            'id_stock_opname' => $this->id_stock_opname,
            'tanggal_stock_opname' => $this->tanggal_stock_opname,
            'created_date' => $this->created_date,
            'created_user_id' => $this->created_user_id,
        ]);

        $query->andFilterWhere(['like', 'nama_kegiatan', $this->nama_kegiatan])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
