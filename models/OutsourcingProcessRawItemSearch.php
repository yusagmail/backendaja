<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\OutsourcingProcessRawItem;

/**
 * OutsourcingProcessRawItemSearch represents the model behind the search form of `backend\models\OutsourcingProcessRawItem`.
 */
class OutsourcingProcessRawItemSearch extends OutsourcingProcessRawItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_outsourcing_process_raw_item', 'id_outsourcing_process_raw', 'id_material_raw_kategori', 'yard', 'harga', 'created_id_user'], 'integer'],
            [['created_date', 'created_ip_address'], 'safe'],
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
        $query = OutsourcingProcessRawItem::find();

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
            'id_outsourcing_process_raw_item' => $this->id_outsourcing_process_raw_item,
            'id_outsourcing_process_raw' => $this->id_outsourcing_process_raw,
            'id_material_raw_kategori' => $this->id_material_raw_kategori,
            'yard' => $this->yard,
            'harga' => $this->harga,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
