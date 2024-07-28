<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MaterialSampel;

/**
 * MaterialSampelSearch represents the model behind the search form of `backend\models\MaterialSampel`.
 */
class MaterialSampelSearch extends MaterialSampel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_material_sampel', 'id_customer', 'id_material_raw_kategori', 'id_subcontractor', 'id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'created_id_user'], 'integer'],
            [['nama_sampel', 'tanggal_minta_sampel', 'tanggal_keluar_sampel', 'kode_barcode', 'keterangan', 'status', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = MaterialSampel::find();

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
            'id_material_sampel' => $this->id_material_sampel,
            'id_customer' => $this->id_customer,
            'id_material_raw_kategori' => $this->id_material_raw_kategori,
            'tanggal_minta_sampel' => $this->tanggal_minta_sampel,
            'tanggal_keluar_sampel' => $this->tanggal_keluar_sampel,
            'id_subcontractor' => $this->id_subcontractor,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'nama_sampel', $this->nama_sampel])
            ->andFilterWhere(['like', 'kode_barcode', $this->kode_barcode])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
