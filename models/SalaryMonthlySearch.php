<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SalaryMonthly;

/**
 * SalaryMonthlySearch represents the model behind the search form of `backend\models\SalaryMonthly`.
 */
class SalaryMonthlySearch extends SalaryMonthly
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_salary_monthly', 'id_pegawai', 'bulan', 'tahun', 'gaji_pokok', 'tunjangan1', 'tunjangan2', 'tunjangan3', 'tunjangan4', 'tunjangan5', 'jml_lembur', 'jml_kehadiran'], 'integer'],
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
        $query = SalaryMonthly::find();

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
            'id_salary_monthly' => $this->id_salary_monthly,
            'id_pegawai' => $this->id_pegawai,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'gaji_pokok' => $this->gaji_pokok,
            'tunjangan1' => $this->tunjangan1,
            'tunjangan2' => $this->tunjangan2,
            'tunjangan3' => $this->tunjangan3,
            'tunjangan4' => $this->tunjangan4,
            'tunjangan5' => $this->tunjangan5,
            'jml_lembur' => $this->jml_lembur,
            'jml_kehadiran' => $this->jml_kehadiran,
        ]);

        return $dataProvider;
    }
}
