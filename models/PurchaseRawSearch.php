<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PurchaseRaw;

/**
 * PurchaseRawSearch represents the model behind the search form of `backend\models\PurchaseRaw`.
 */
class PurchaseRawSearch extends PurchaseRaw
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_purchase_raw', 'id_supplier', 'month', 'year', 'total_tagihan', 'bayar_total_bayar', 'bayar_id_bank_pembayaran', 'created_id_user'], 'integer'],
            [['tanggal_order', 'nomor_kontrak', 'nomor_surat_jalan', 'bayar_cara', 'bayar_tanggal_bayar', 'bayar_bukti', 'status_purchasing', 'status_pembayaran', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = PurchaseRaw::find();

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
            'id_purchase_raw' => $this->id_purchase_raw,
            'tanggal_order' => $this->tanggal_order,
            'id_supplier' => $this->id_supplier,
            'month' => $this->month,
            'year' => $this->year,
            'total_tagihan' => $this->total_tagihan,
            'bayar_total_bayar' => $this->bayar_total_bayar,
            'bayar_tanggal_bayar' => $this->bayar_tanggal_bayar,
            'bayar_id_bank_pembayaran' => $this->bayar_id_bank_pembayaran,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'nomor_kontrak', $this->nomor_kontrak])
            ->andFilterWhere(['like', 'nomor_surat_jalan', $this->nomor_surat_jalan])
            ->andFilterWhere(['like', 'bayar_cara', $this->bayar_cara])
            ->andFilterWhere(['like', 'bayar_bukti', $this->bayar_bukti])
            ->andFilterWhere(['like', 'status_purchasing', $this->status_purchasing])
            ->andFilterWhere(['like', 'status_pembayaran', $this->status_pembayaran])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
