<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PalletGudang;

/**
 * PalletGudangSearch represents the model behind the search form of `backend\models\PalletGudang`.
 */
class PalletGudangSearch extends PalletGudang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pallet_gudang', 'id_gudang'], 'integer'],
            [['nomor_pallet', 'kode', 'pallet_group', 'keterangan'], 'safe'],
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
        $query = PalletGudang::find();

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
            'id_pallet_gudang' => $this->id_pallet_gudang,
            'id_gudang' => $this->id_gudang,
        ]);

        $query->andFilterWhere(['like', 'nomor_pallet', $this->nomor_pallet])
            ->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'pallet_group', $this->pallet_group])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
