<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MaterialInItemProc;

/**
 * MaterialInItemProcSearch represents the model behind the search form of `backend\models\MaterialInItemProc`.
 */
class MaterialInItemProcSearch extends MaterialInItemProc
{
    public static function getPagination($request_params)
    {
        $param_val = 'page';
        foreach ($request_params as $key => $value) {
            if (strpos($key, '_tog') !== false) {
                $param_val = $value;
            }
        }
        $pagination = array();
        if ($param_val == 'all') { //returns empty array, which will show all data.
            $pagination = ['pageSize' => false];
        } else if ($param_val == 'page') { //return pageSize as 5
            $pagination = ['pageSize' => 20];
        } else {
            $pagination = ['pageSize' => false];
        }
        return $pagination;  // returns empty array again.
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_material_in_item_proc', 'id_material_in', 'yard_awal', 'yard_hasil1', 'yard_hasil2', 'yard_hasil3', 'yard_hasil4', 'yard_hasil5', 'yard_hasil6', 'yard_hasil_total', 'buang1', 'buang2', 'is_packing', 'id_basic_packing', 'created_id_user'], 'integer'],
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
        $query = MaterialInItemProc::find();

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
            'id_material_in_item_proc' => $this->id_material_in_item_proc,
            'id_material_in' => $this->id_material_in,
            'yard_awal' => $this->yard_awal,
            'yard_hasil1' => $this->yard_hasil1,
            'yard_hasil2' => $this->yard_hasil2,
            'yard_hasil3' => $this->yard_hasil3,
            'yard_hasil4' => $this->yard_hasil4,
            'yard_hasil5' => $this->yard_hasil5,
            'yard_hasil6' => $this->yard_hasil6,
            'yard_hasil_total' => $this->yard_hasil_total,
            'buang1' => $this->buang1,
            'buang2' => $this->buang2,
            'is_packing' => $this->is_packing,
            'id_basic_packing' => $this->id_basic_packing,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $dataProvider->pagination = false;

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }
}
