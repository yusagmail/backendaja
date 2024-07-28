<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MstProductComponent;

/**
 * MstProductComponentSearch represents the model behind the search form of `backend\models\MstProductComponent`.
 */
class MstProductComponentSearch extends MstProductComponent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_product_component', 'no_urut', 'is_finish_product', 'created_id_user'], 'integer'],
            [['kode', 'nama', 'no_urut_kode', 'barcode_kode', 'deskripsi', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = MstProductComponent::find();

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
            'id_mst_product_component' => $this->id_mst_product_component,
            'no_urut' => $this->no_urut,
            'is_finish_product' => $this->is_finish_product,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        return $dataProvider;
    }
}
