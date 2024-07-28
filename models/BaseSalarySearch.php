<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BaseSalary;

/**
 * BaseSalarySearch represents the model behind the search form of `backend\models\BaseSalary`.
 */
class BaseSalarySearch extends BaseSalary
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_base_salary', 'id_pegawai', 'gaji_pokok', 'tunjangan1', 'tunjangan2', 'tunjangan3', 'tunjangan4', 'tunjangan5', 'rate_lembur', 'rate_kehadiran', 'property1', 'property2', 'property3', 'property4', 'property5'], 'integer'],
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
        $query = BaseSalary::find();

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
            'id_base_salary' => $this->id_base_salary,
            'id_pegawai' => $this->id_pegawai,
            'gaji_pokok' => $this->gaji_pokok,
            'tunjangan1' => $this->tunjangan1,
            'tunjangan2' => $this->tunjangan2,
            'tunjangan3' => $this->tunjangan3,
            'tunjangan4' => $this->tunjangan4,
            'tunjangan5' => $this->tunjangan5,
            'rate_lembur' => $this->rate_lembur,
            'rate_kehadiran' => $this->rate_kehadiran,
            'property1' => $this->property1,
            'property2' => $this->property2,
            'property3' => $this->property3,
            'property4' => $this->property4,
            'property5' => $this->property5,
        ]);

        return $dataProvider;
    }
}
