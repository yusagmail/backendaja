<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ItemProductComponent;

/**
 * ItemProductComponentSearch represents the model behind the search form of `backend\models\ItemProductComponent`.
 */
class ItemProductComponentSearch extends ItemProductComponent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_item_product_component', 'id_mst_product_component', 'no_urut', 'id_gudang', 'created_id_user'], 'integer'],
            [['kode_item', 'nama_item', 'no_urut_kode', 'barcode_item_kode', 'catatan', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = ItemProductComponent::find();

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
            'id_item_product_component' => $this->id_item_product_component,
            'id_mst_product_component' => $this->id_mst_product_component,
            'no_urut' => $this->no_urut,
            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'kode_item', $this->kode_item])
            ->andFilterWhere(['like', 'nama_item', $this->nama_item])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_item_kode', $this->barcode_item_kode])
            ->andFilterWhere(['like', 'catatan', $this->catatan])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
