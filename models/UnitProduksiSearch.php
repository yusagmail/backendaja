<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UnitProduksi;

/**
 * UnitProduksiSearch represents the model behind the search form of `backend\models\UnitProduksi`.
 */
class UnitProduksiSearch extends UnitProduksi
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
            [['id_unit_produksi', 'jumlah_operator'], 'integer'],
            [['nama_unit', 'lokasi', 'foto1', 'desc_fungsi', 'desc_material_in', 'desc_proses', 'desc_material_out'], 'safe'],
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
        $query = UnitProduksi::find();

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
            'id_unit_produksi' => $this->id_unit_produksi,
            'jumlah_operator' => $this->jumlah_operator,
        ]);

        $query->andFilterWhere(['like', 'nama_unit', $this->nama_unit])
            ->andFilterWhere(['like', 'lokasi', $this->lokasi])
            ->andFilterWhere(['like', 'foto1', $this->foto1])
            ->andFilterWhere(['like', 'desc_fungsi', $this->desc_fungsi])
            ->andFilterWhere(['like', 'desc_material_in', $this->desc_material_in])
            ->andFilterWhere(['like', 'desc_proses', $this->desc_proses])
            ->andFilterWhere(['like', 'desc_material_out', $this->desc_material_out]);

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }
}
