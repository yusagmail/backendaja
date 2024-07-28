<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Akun;

/**
 * AkunSearch represents the model behind the search form of `backend\models\Akun`.
 */
class AkunSearch extends Akun
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
            [['id_akun', 'id_parent'], 'integer'],
            [['kode_akun', 'nama_akun', 'debet_kredit', 'kategori'], 'safe'],
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
        $query = Akun::find();

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
            'id_akun' => $this->id_akun,
            'id_parent' => $this->id_parent,
        ]);

        $query->andFilterWhere(['like', 'kode_akun', $this->kode_akun])
            ->andFilterWhere(['like', 'nama_akun', $this->nama_akun])
            ->andFilterWhere(['like', 'debet_kredit', $this->debet_kredit])
            ->andFilterWhere(['like', 'kategori', $this->kategori]);

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }

    //Static Function Untuk Fitur Penjualan
    public static function AkunKas(){
        return 1111; //Hardcoded Kas
    }

    public static function AkunPiutangUsaha(){
        return 1114; //Hardcoded Kas
    }

    public static function AkunPenjualan(){
        return 4100; //Pendapatan Usaha
    }


}
