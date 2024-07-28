<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SalesRetur;

/**
 * SalesReturSearch represents the model behind the search form of `backend\models\SalesRetur`.
 */
class SalesReturSearch extends SalesRetur
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sales_retur', 'id_sales_order', 'tanggal_retur', 'id_penerima_barang'], 'integer'],
            [['alasan_retur', 'catatan_kondisi_barang'], 'safe'],
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
        $query = SalesRetur::find();

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
            'id_sales_retur' => $this->id_sales_retur,
            'id_sales_order' => $this->id_sales_order,
            'tanggal_retur' => $this->tanggal_retur,
            'id_penerima_barang' => $this->id_penerima_barang,
        ]);

        $query->andFilterWhere(['like', 'alasan_retur', $this->alasan_retur])
            ->andFilterWhere(['like', 'catatan_kondisi_barang', $this->catatan_kondisi_barang]);

        return $dataProvider;
    }
}
