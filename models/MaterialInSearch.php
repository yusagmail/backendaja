<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MaterialIn;

/**
 * MaterialInSearch represents the model behind the search form of `backend\models\MaterialIn`.
 */
class MaterialInSearch extends MaterialIn
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
            [['id_material_in', 'id_unit_poduksi', 'id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'id_supplier', 'created_id_user'], 'integer'],
            [['varian', 'tanggal_proses', 'catatan', 'created_date', 'created_ip_address', 'tanggal_surat_jalan', 'nomor_surat_jalan'], 'safe'],
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
        $query = MaterialIn::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
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
            'id_material_in' => $this->id_material_in,
            'id_unit_poduksi' => $this->id_unit_poduksi,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,
            'id_supplier' => $this->id_supplier,
            'tanggal_proses' => $this->tanggal_proses,
            'nomor_surat_jalan' => $this->nomor_surat_jalan,
            'tanggal_surat_jalan' => $this->tanggal_surat_jalan,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'varian', $this->varian])
            ->andFilterWhere(['like', 'catatan', $this->catatan])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $dataProvider->setSort([
            'defaultOrder' => ['tanggal_proses' => SORT_DESC]
        ]);



        return $dataProvider;
    }
}
