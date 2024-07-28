<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BankPembayaran;

/**
 * BankPembayaranSearch represents the model behind the search form of `backend\models\BankPembayaran`.
 */
class BankPembayaranSearch extends BankPembayaran
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bank_pembayaran'], 'integer'],
            [['nama_bank', 'nama_bank_short', 'nomor_rekening', 'atas_nama', 'kode'], 'safe'],
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
        $query = BankPembayaran::find();

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
            'id_bank_pembayaran' => $this->id_bank_pembayaran,
        ]);

        $query->andFilterWhere(['like', 'nama_bank', $this->nama_bank])
            ->andFilterWhere(['like', 'nama_bank_short', $this->nama_bank_short])
            ->andFilterWhere(['like', 'nomor_rekening', $this->nomor_rekening])
            ->andFilterWhere(['like', 'atas_nama', $this->atas_nama])
            ->andFilterWhere(['like', 'kode', $this->kode]);

        return $dataProvider;
    }
}
