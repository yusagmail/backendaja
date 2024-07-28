<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MutasiStockItem;

/**
 * MutasiStockItemSearch represents the model behind the search form of `backend\models\MutasiStockItem`.
 */
class MutasiStockItemSearch extends MutasiStockItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mutasi_stock_item', 'id_mutasi_stock', 'id_material_finish'], 'integer'],
            [['keterangan'], 'safe'],
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
        $query = MutasiStockItem::find();

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
            'id_mutasi_stock_item' => $this->id_mutasi_stock_item,
            'id_mutasi_stock' => $this->id_mutasi_stock,
            'id_material_finish' => $this->id_material_finish,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        $dataProvider->setSort([
            'defaultOrder' => ['id_mutasi_stock_item' => SORT_DESC]
        ]);

        return $dataProvider;
    }
}
