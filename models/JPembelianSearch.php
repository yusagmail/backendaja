<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\JPembelian;

/**
 * JPembelianSearch represents the model behind the search form of `backend\models\JPembelian`.
 */
class JPembelianSearch extends JPembelian
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_j_pembelian', 'id_material_support', 'jumlah', 'bulan', 'tahun'], 'integer'],
            [['total_biaya'], 'number'],
            [['no_bukti', 'tanggal_pembelian'], 'safe'],
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
        $query = JPembelian::find();

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
            'id_j_pembelian' => $this->id_j_pembelian,
            'id_material_support' => $this->id_material_support,
            'jumlah' => $this->jumlah,
            'total_biaya' => $this->total_biaya,
            'tanggal_pembelian' => $this->tanggal_pembelian,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
        ]);

        $query->andFilterWhere(['like', 'no_bukti', $this->no_bukti]);

        return $dataProvider;
    }
}
