<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MaterialRawKategori1;

/**
 * MaterialRawKategori1Search represents the model behind the search form of `backend\models\MaterialRawKategori1`.
 */
class MaterialRawKategori1Search extends MaterialRawKategori1
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_material_raw_kategori', 'is_active'], 'integer'],
            [['kode', 'nama'], 'safe'],
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
        $query = MaterialRawKategori1::find();

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
            'id_material_raw_kategori' => $this->id_material_raw_kategori,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'nama', $this->nama]);

        return $dataProvider;
    }
}
