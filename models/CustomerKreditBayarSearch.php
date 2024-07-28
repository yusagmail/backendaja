<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CustomerKreditBayar;

/**
 * CustomerKreditBayarSearch represents the model behind the search form of `backend\models\CustomerKreditBayar`.
 */
class CustomerKreditBayarSearch extends CustomerKreditBayar
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
            [['id_customer_kredit_bayar', 'id_customer', 'jumlah_bayar', 'id_bank_pembayaran', 'id_sales_order', 'created_user_id'], 'integer'],
            [['tanggal_bayar', 'cara_bayar', 'status_pembayaran', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = CustomerKreditBayar::find();

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
            'id_customer_kredit_bayar' => $this->id_customer_kredit_bayar,
            'id_customer' => $this->id_customer,
            'tanggal_bayar' => $this->tanggal_bayar,
            'jumlah_bayar' => $this->jumlah_bayar,
            'id_bank_pembayaran' => $this->id_bank_pembayaran,
            'id_sales_order' => $this->id_sales_order,
            'created_date' => $this->created_date,
            'created_user_id' => $this->created_user_id,
        ]);

        $query->andFilterWhere(['like', 'cara_bayar', $this->cara_bayar])
            ->andFilterWhere(['like', 'status_pembayaran', $this->status_pembayaran])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }
}
