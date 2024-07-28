<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DefectaDetails;

/**
 * DefectaDetailsSearch represents the model behind the search form of `backend\models\DefectaDetails`.
 */
class DefectaDetailsSearch extends DefectaDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_defecta_detail', 'id_defecta', 'id_asset_master', 'sisa', 'pemakaian_sebulan', 'kebutuhan'], 'integer'],
            [['satuan', 'keterangan', 'created_at', 'updated_at'], 'safe'],
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
        $query = DefectaDetails::find();

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
            'id_defecta_detail' => $this->id_defecta_detail,
            'id_defecta' => $this->id_defecta,
            'id_asset_master' => $this->id_asset_master,
            'sisa' => $this->sisa,
            'pemakaian_sebulan' => $this->pemakaian_sebulan,
            'kebutuhan' => $this->kebutuhan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'satuan', $this->satuan])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
