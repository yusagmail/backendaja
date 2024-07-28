<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\StockOpnameItem;

/**
 * StockOpnameItemSearch represents the model behind the search form of `backend\models\StockOpnameItem`.
 */
class StockOpnameItemSearch extends StockOpnameItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_stock_opname_item', 'id_stock_opname', 'id_material_finish', 'id_gudang', 'created_user_id'], 'integer'],
            [['redundat_barcode_code', 'keterangan', 'entry_time'], 'safe'],
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
        $query = StockOpnameItem::find();

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
            'id_stock_opname_item' => $this->id_stock_opname_item,
            'id_stock_opname' => $this->id_stock_opname,
            'id_material_finish' => $this->id_material_finish,
            'id_gudang' => $this->id_gudang,
            'entry_time' => $this->entry_time,
            'created_user_id' => $this->created_user_id,
        ]);

        $query->andFilterWhere(['like', 'redundat_barcode_code', $this->redundat_barcode_code])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
