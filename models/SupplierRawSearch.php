<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SupplierRaw;

/**
 * SupplierRawSearch represents the model behind the search form of `backend\models\SupplierRaw`.
 */
class SupplierRawSearch extends SupplierRaw
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_supplier_raw', 'id_kabupaten', 'created_user_id'], 'integer'],
            [['nama_supplier', 'alamat', 'nomor_telepon', 'email', 'npwp', 'nama_kontak', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = SupplierRaw::find();

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
            'id_supplier_raw' => $this->id_supplier_raw,
            'id_kabupaten' => $this->id_kabupaten,
            'created_date' => $this->created_date,
            'created_user_id' => $this->created_user_id,
        ]);

        $query->andFilterWhere(['like', 'nama_supplier', $this->nama_supplier])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'nomor_telepon', $this->nomor_telepon])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'npwp', $this->npwp])
            ->andFilterWhere(['like', 'nama_kontak', $this->nama_kontak])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
