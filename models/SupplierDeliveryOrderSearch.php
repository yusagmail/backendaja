<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SupplierDeliveryOrder;

/**
 * SupplierDeliveryOrderSearch represents the model behind the search form of `backend\models\SupplierDeliveryOrder`.
 */
class SupplierDeliveryOrderSearch extends SupplierDeliveryOrder
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
            [['id_supplier_delivery_order', 'id_supplier'], 'integer'],
            [['nomor_surat_jalan', 'tanggal_surat_jalan', 'nomor_invoice', 'catatan'], 'safe'],
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
        $query = SupplierDeliveryOrder::find();

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
            'id_supplier_delivery_order' => $this->id_supplier_delivery_order,
            'id_supplier' => $this->id_supplier,
            'tanggal_surat_jalan' => $this->tanggal_surat_jalan,
        ]);

        $query->andFilterWhere(['like', 'nomor_surat_jalan', $this->nomor_surat_jalan])
            ->andFilterWhere(['like', 'nomor_invoice', $this->nomor_invoice])
            ->andFilterWhere(['like', 'catatan', $this->catatan]);

        $dataProvider->setSort([
            'defaultOrder' => ['tanggal_surat_jalan' => SORT_DESC]
        ]);

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }
}
