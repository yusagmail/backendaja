<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SalesReturItem;

/**
 * SalesReturItemSearch represents the model behind the search form of `backend\models\SalesReturItem`.
 */
class SalesReturItemSearch extends SalesReturItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sales_retur_item', 'retur_id_sales_order', 'retur_id_sales_retur', 'retur_id_outlet_penjualan', 'retur_created_id_user', 'id_material_finish', 'id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'yard', 'year', 'no_urut', 'no_splitting', 'is_packing', 'id_basic_packing', 'id_material_in_item_proc', 'id_material_in', 'is_join_packing', 'id_gudang', 'created_id_user'], 'integer'],
            [['retur_created_date', 'retur_created_ip_address', 'kode', 'no_urut_kode', 'barcode_kode', 'deskripsi', 'join_info', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = SalesReturItem::find();

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
            'id_sales_retur_item' => $this->id_sales_retur_item,
            'retur_id_sales_order' => $this->retur_id_sales_order,
            'retur_id_sales_retur' => $this->retur_id_sales_retur,
            'retur_id_outlet_penjualan' => $this->retur_id_outlet_penjualan,
            'retur_created_id_user' => $this->retur_created_id_user,
            'retur_created_date' => $this->retur_created_date,
            'id_material_finish' => $this->id_material_finish,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,
            'yard' => $this->yard,
            'year' => $this->year,
            'no_urut' => $this->no_urut,
            'no_splitting' => $this->no_splitting,
            'is_packing' => $this->is_packing,
            'id_basic_packing' => $this->id_basic_packing,
            'id_material_in_item_proc' => $this->id_material_in_item_proc,
            'id_material_in' => $this->id_material_in,
            'is_join_packing' => $this->is_join_packing,
            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'retur_created_ip_address', $this->retur_created_ip_address])
            ->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'join_info', $this->join_info])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
