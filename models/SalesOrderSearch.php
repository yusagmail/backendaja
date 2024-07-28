<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SalesOrder;

/**
 * SalesOrderSearch represents the model behind the search form of `backend\models\SalesOrder`.
 */
class SalesOrderSearch extends SalesOrder
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
            [['id_sales_order', 'id_customer', 'id_outlet_penjualan', 'nomor', 'month', 'year', 'invoice_total', 'bayar_total_bayar', 'bayar_id_bank_pembayaran', 'bayar_uang_muka', 'created_id_user'], 'integer'],
            [['tanggal_order', 'nomor_sales_order', 'bayar_cara', 'bayar_bukti', 'status_order', 'created_date', 'created_ip_address', 'status_invoice'], 'safe'],
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
        $query = SalesOrder::find();

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
            'id_sales_order' => $this->id_sales_order,
            'tanggal_order' => $this->tanggal_order,
            'id_customer' => $this->id_customer,
            'id_outlet_penjualan' => $this->id_outlet_penjualan,
            'nomor' => $this->nomor,
            'month' => $this->month,
            'year' => $this->year,
            'invoice_total' => $this->invoice_total,
            'bayar_total_bayar' => $this->bayar_total_bayar,
            'bayar_id_bank_pembayaran' => $this->bayar_id_bank_pembayaran,
            'bayar_uang_muka' => $this->bayar_uang_muka,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
            'status_invoice' => $this->status_invoice,
        ]);

        $query->andFilterWhere(['like', 'nomor_sales_order', $this->nomor_sales_order])
            ->andFilterWhere(['like', 'bayar_cara', $this->bayar_cara])
            ->andFilterWhere(['like', 'bayar_bukti', $this->bayar_bukti])
            ->andFilterWhere(['like', 'status_order', $this->status_order])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'defaultOrder' => ['tanggal_order' => SORT_DESC, 'nomor' => SORT_DESC,]
        ]);

        return $dataProvider;
    }


    public function searchNonBaru($params)
    {
        $query = SalesOrder::find();

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
            'id_sales_order' => $this->id_sales_order,
            'tanggal_order' => $this->tanggal_order,
            'id_customer' => $this->id_customer,
            'id_outlet_penjualan' => $this->id_outlet_penjualan,
            'nomor' => $this->nomor,
            'month' => $this->month,
            'year' => $this->year,
            'invoice_total' => $this->invoice_total,
            'bayar_total_bayar' => $this->bayar_total_bayar,
            'bayar_id_bank_pembayaran' => $this->bayar_id_bank_pembayaran,
            'bayar_uang_muka' => $this->bayar_uang_muka,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
            //'status_invoice' => $this->status_invoice,
        ]);

        $query->andFilterWhere(['like', 'nomor_sales_order', $this->nomor_sales_order])
            ->andFilterWhere(['like', 'bayar_cara', $this->bayar_cara])
            ->andFilterWhere(['like', 'bayar_bukti', $this->bayar_bukti])
            ->andFilterWhere(['like', 'status_order', $this->status_order])
            ->andFilterWhere(['!=', 'status_invoice', 'BELUM'])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'defaultOrder' => ['tanggal_order' => SORT_DESC, 'nomor' => SORT_DESC,]
        ]);

        return $dataProvider;
    }

    public static function getStatusPembayaranView($model){
        switch($model->status_pembayaran ){
            case "BELUM":
                return '<span class="label label-danger">BELUM</span>';
            case "PARTIAL":
                return '<span class="label label-warning">SEBAGIAN</span>';
            case "LUNAS":
                return '<span class="label label-success">LUNAS</span>';
            case "LEBIH BAYAR":
                return '<span class="label label-danger">LEBIH BAYAR</span>';
        }
    }
}
