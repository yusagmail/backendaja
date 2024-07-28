<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MutasiStock;

/**
 * MutasiStockSearch represents the model behind the search form of `backend\models\MutasiStock`.
 */
class MutasiStockSearch extends MutasiStock
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mutasi_stock', 'id_gudang_asal', 'id_gudang_tujuan', 'id_pemberi_perintah', 'id_pelaksana_perintah'], 'integer'],
            [['tanggal_mutasi', 'keterangan'], 'safe'],
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
        $query = MutasiStock::find();

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
            'id_mutasi_stock' => $this->id_mutasi_stock,
            'tanggal_mutasi' => $this->tanggal_mutasi,
            'id_gudang_asal' => $this->id_gudang_asal,
            'id_gudang_tujuan' => $this->id_gudang_tujuan,
            'id_pemberi_perintah' => $this->id_pemberi_perintah,
            'id_pelaksana_perintah' => $this->id_pelaksana_perintah,
        ]);

        $dataProvider->setSort([
            'defaultOrder' => ['tanggal_mutasi' => SORT_DESC]
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
