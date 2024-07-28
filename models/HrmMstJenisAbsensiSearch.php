<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HrmMstJenisAbsensi;

/**
 * HrmMstJenisAbsensiSearch represents the model behind the search form of `backend\models\HrmMstJenisAbsensi`.
 */
class HrmMstJenisAbsensiSearch extends HrmMstJenisAbsensi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_jenis_absensi', 'is_aktif'], 'integer'],
            [['jenis_absensi'], 'safe'],
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
        $query = HrmMstJenisAbsensi::find();

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
            'id_mst_jenis_absensi' => $this->id_mst_jenis_absensi,
            'is_aktif' => $this->is_aktif,
        ]);

        $query->andFilterWhere(['like', 'jenis_absensi', $this->jenis_absensi]);

        return $dataProvider;
    }
}
