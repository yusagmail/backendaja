<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Supplier;

/**
 * SupplierSearch represents the model behind the search form of `backend\models\Supplier`.
 */
class SupplierSearch extends Supplier
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_supplier', 'no_phone'], 'integer'],
            [['nama_supplier', 'alamat_supplier', 'pic_nama'], 'safe'],
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
        $query = Supplier::find();

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
            'id_supplier' => $this->id_supplier,
            'no_phone' => $this->no_phone,
        ]);

        $query->andFilterWhere(['like', 'nama_supplier', $this->nama_supplier])
            ->andFilterWhere(['like', 'alamat_supplier', $this->alamat_supplier])
            ->andFilterWhere(['like', 'pic_nama', $this->pic_nama]);

        return $dataProvider;
    }
}
