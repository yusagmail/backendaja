<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MaterialSales;

/**
 * MaterialSalesSearch represents the model behind the search form of `backend\models\MaterialSales`.
 */
class MaterialSalesSearch extends MaterialSales
{
    public static function getPagination($request_params)
    {
        $param_val = 'page';
        foreach ($request_params as $key => $value) {
            if (strpos($key, '_tog') !== false) {
                $param_val = $value;
            }
        }
        $pagination = array();
        if ($param_val == 'all') { //returns empty array, which will show all data.
            $pagination = ['pageSize' => false];
        } else if ($param_val == 'page') { //return pageSize as 5
            $pagination = ['pageSize' => 20];
        } else {
            $pagination = ['pageSize' => false];
        }
        return $pagination;  // returns empty array again.
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_material_sales', 'sales_id_sales_order', 'sales_harga_jual', 'sales_created_id_user', 'id_material_finish', 'id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'yard', 'year', 'no_urut', 'no_splitting', 'is_packing', 'id_basic_packing', 'id_material_in_item_proc', 'id_material_in', 'is_join_packing', 'id_gudang', 'created_id_user'], 'integer'],
            [['sales_created_date', 'sales_created_ip_address', 'kode', 'no_urut_kode', 'barcode_kode', 'deskripsi', 'join_info', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = MaterialSales::find();

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
            'id_material_sales' => $this->id_material_sales,
            'sales_id_sales_order' => $this->sales_id_sales_order,
            'sales_harga_jual' => $this->sales_harga_jual,
            'sales_created_id_user' => $this->sales_created_id_user,
            'sales_created_date' => $this->sales_created_date,
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

        $query->andFilterWhere(['like', 'sales_created_ip_address', $this->sales_created_ip_address])
            ->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'join_info', $this->join_info])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function searchByOrder($params, $tanggal_order)
    {
        $query = MaterialSales::find();
        $query = MaterialSales::find()->joinWith('salesOrder');

        /*
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['firstname', 'lastname', 'groupname', 'email', 'pemail']]
        ]);
        // add conditions that should always apply here
        */

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
            'id_material_sales' => $this->id_material_sales,
            'sales_id_sales_order' => $this->sales_id_sales_order,
            'sales_harga_jual' => $this->sales_harga_jual,
            'sales_created_id_user' => $this->sales_created_id_user,
            'sales_created_date' => $this->sales_created_date,
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

        $query->andFilterWhere(['like', 'sales_created_ip_address', $this->sales_created_ip_address])
            ->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'join_info', $this->join_info])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $query->andFilterWhere(['like', 'sales_order.tanggal_order', $tanggal_order]);

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function searchGroupBy($params)
    {
        $query = MaterialSales::find();
        $query->select('id_material, id_material_kategori1, id_material_kategori3, sales_harga_jual, COUNT(id_material_finish) as jumlah, SUM(yard) as yard, MAX(id_material_finish)');

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
            'id_material_sales' => $this->id_material_sales,
            'sales_id_sales_order' => $this->sales_id_sales_order,
            'sales_harga_jual' => $this->sales_harga_jual,
            'sales_created_id_user' => $this->sales_created_id_user,
            'sales_created_date' => $this->sales_created_date,
            'id_material_finish' => $this->id_material_finish,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,
            // 'yard' => $this->yard,
            // 'year' => $this->year,
            // 'no_urut' => $this->no_urut,
            'no_splitting' => $this->no_splitting,
            // 'is_packing' => $this->is_packing,
            // 'id_basic_packing' => $this->id_basic_packing,
            // 'id_material_in_item_proc' => $this->id_material_in_item_proc,
            // 'id_material_in' => $this->id_material_in,
            'is_join_packing' => $this->is_join_packing,
            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'sales_created_ip_address', $this->sales_created_ip_address])
            ->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'join_info', $this->join_info])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $query->groupBy('id_material, id_material_kategori1, id_material_kategori2, id_material_kategori3, sales_harga_jual');

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function searchGroupByLevel1($params)
    {
        $query = MaterialSales::find();
        $query->select('id_material, id_material_kategori1, id_material_kategori3, sales_harga_jual, COUNT(id_material_finish) as jumlah, SUM(yard) as yard, MAX(id_material_finish)');

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
            'id_material_sales' => $this->id_material_sales,
            'sales_id_sales_order' => $this->sales_id_sales_order,
            'sales_harga_jual' => $this->sales_harga_jual,
            'sales_created_id_user' => $this->sales_created_id_user,
            'sales_created_date' => $this->sales_created_date,
            'id_material_finish' => $this->id_material_finish,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,
            // 'yard' => $this->yard,
            // 'year' => $this->year,
            // 'no_urut' => $this->no_urut,
            'no_splitting' => $this->no_splitting,
            // 'is_packing' => $this->is_packing,
            // 'id_basic_packing' => $this->id_basic_packing,
            // 'id_material_in_item_proc' => $this->id_material_in_item_proc,
            // 'id_material_in' => $this->id_material_in,
            'is_join_packing' => $this->is_join_packing,
            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'sales_created_ip_address', $this->sales_created_ip_address])
            ->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'join_info', $this->join_info])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $query->groupBy('id_material, sales_harga_jual');

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }
}
