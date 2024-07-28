<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MaterialFinish;

/**
 * MaterialFinishSearch represents the model behind the search form of `backend\models\MaterialFinish`.
 */
class MaterialFinishSearch extends MaterialFinish
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
            [['id_material_finish', 'id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'yard', 'year', 'no_urut', 'is_packing', 'id_basic_packing', 'id_material_in_item_proc', 'id_material_in', 'id_gudang', 'created_id_user', 'id_pallet_gudang'], 'integer'],
            [['kode', 'no_urut_kode', 'barcode_kode', 'deskripsi', 'created_date', 'created_ip_address'], 'safe'],
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
        $query = MaterialFinish::find();

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
            'id_material_finish' => $this->id_material_finish,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,
            'yard' => $this->yard,
            'year' => $this->year,
            'no_urut' => $this->no_urut,
            'is_packing' => $this->is_packing,
            'id_basic_packing' => $this->id_basic_packing,
            'id_pallet_gudang' => $this->id_pallet_gudang,
            //'id_material_in_item_proc' => $this->id_material_in_item_proc,
            'id_material_in' => $this->id_material_in,
            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        //Spesial query untuk memilih sumber data yang digenerate manual atau dari produksi
        if($this->id_material_in_item_proc == 0){
            $query->andFilterWhere(['=', 'id_material_in_item_proc', $this->id_material_in_item_proc]);
        }else{
            $query->andFilterWhere(['>=', 'id_material_in_item_proc', $this->id_material_in_item_proc]);
        }

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);
            //->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function searchLikeBarcode($params)
    {
        $query = MaterialFinish::find();

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
            'id_material_finish' => $this->id_material_finish,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,
            'yard' => $this->yard,
            'year' => $this->year,
            'no_urut' => $this->no_urut,
            'is_packing' => $this->is_packing,
            'id_basic_packing' => $this->id_basic_packing,
            'id_pallet_gudang' => $this->id_pallet_gudang,
            //'id_material_in_item_proc' => $this->id_material_in_item_proc,
            'id_material_in' => $this->id_material_in,
            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        //Spesial query untuk memilih sumber data yang digenerate manual atau dari produksi
        if($this->id_material_in_item_proc == 0){
            $query->andFilterWhere(['=', 'id_material_in_item_proc', $this->id_material_in_item_proc]);
        }else{
            $query->andFilterWhere(['>=', 'id_material_in_item_proc', $this->id_material_in_item_proc]);
        }

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode, false])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);
            //->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function searchGroupBy($params)
    {
        $query = MaterialFinish::find();
        $query->select('id_material, id_gudang, COUNT(id_material_finish) as jumlah, MAX(id_material_finish)');

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
            'id_material_finish' => $this->id_material_finish,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,
            /*
            'yard' => $this->yard,
            'year' => $this->year,
            'no_urut' => $this->no_urut,
            'is_packing' => $this->is_packing,
            'id_basic_packing' => $this->id_basic_packing,
            'id_material_in_item_proc' => $this->id_material_in_item_proc,
            'id_material_in' => $this->id_material_in,
            */
            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $query->groupBy('id_material, id_gudang');

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function searchGroupByYard($params)
    {
        $query = MaterialFinish::find();
        $query->select('id_material, yard, id_gudang, COUNT(id_material_finish) as jumlah, yard*COUNT(id_material_finish) as total_yard, MAX(id_material_finish)');

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
            'id_material_finish' => $this->id_material_finish,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,
            'yard' => $this->yard,
            /*
            'year' => $this->year,
            'no_urut' => $this->no_urut,
            'is_packing' => $this->is_packing,
            'id_basic_packing' => $this->id_basic_packing,
            'id_material_in_item_proc' => $this->id_material_in_item_proc,
            'id_material_in' => $this->id_material_in,
            */
            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $query->groupBy('id_material, id_gudang, yard');
        //echo $query->createCommand()->getRawSql();

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function searchGroupByKategori1($params)
    {
        $query = MaterialFinish::find();
        $query->select('id_material, id_gudang, id_material_kategori1, COUNT(id_material_finish) as jumlah, MAX(id_material_finish)');

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
            'id_material_finish' => $this->id_material_finish,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,
            /*
            'yard' => $this->yard,
            'year' => $this->year,
            'no_urut' => $this->no_urut,
            'is_packing' => $this->is_packing,
            'id_basic_packing' => $this->id_basic_packing,
            'id_material_in_item_proc' => $this->id_material_in_item_proc,
            'id_material_in' => $this->id_material_in,
            */
            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $query->groupBy('id_material, id_material_kategori1, id_gudang');

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function searchGroupByKategori1Yard($params)
    {
        $query = MaterialFinish::find();
        $query->select('id_material, yard, id_gudang, id_material_kategori1, COUNT(id_material_finish) as jumlah, yard*COUNT(id_material_finish) as total_yard, MAX(id_material_finish)');

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
            'id_material_finish' => $this->id_material_finish,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,
            
            'yard' => $this->yard,
            /*
            'year' => $this->year,
            'no_urut' => $this->no_urut,
            'is_packing' => $this->is_packing,
            'id_basic_packing' => $this->id_basic_packing,
            'id_material_in_item_proc' => $this->id_material_in_item_proc,
            'id_material_in' => $this->id_material_in,
            */
            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $query->groupBy('id_material, id_material_kategori1, yard, id_gudang');

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }


    public function searchGroupByKategori2($params)
    {
        $query = MaterialFinish::find();
        $query->select('id_material, id_gudang, id_material_kategori1,id_material_kategori2, COUNT(id_material_finish) as jumlah, MAX(id_material_finish)');

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
            'id_material_finish' => $this->id_material_finish,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,
            /*
            'yard' => $this->yard,
            'year' => $this->year,
            'no_urut' => $this->no_urut,
            'is_packing' => $this->is_packing,
            'id_basic_packing' => $this->id_basic_packing,
            'id_material_in_item_proc' => $this->id_material_in_item_proc,
            'id_material_in' => $this->id_material_in,
            */
            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $query->groupBy('id_material, id_material_kategori1, id_material_kategori2, id_gudang');

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function searchGroupByKategori2Yard($params)
    {
        $query = MaterialFinish::find();
        $query->select('id_material, id_gudang, yard, id_material_kategori1,id_material_kategori2, COUNT(id_material_finish) as jumlah, yard*COUNT(id_material_finish) as total_yard, MAX(id_material_finish)');

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
            'id_material_finish' => $this->id_material_finish,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,

            'yard' => $this->yard,
            /*
            'year' => $this->year,
            'no_urut' => $this->no_urut,
            'is_packing' => $this->is_packing,
            'id_basic_packing' => $this->id_basic_packing,
            'id_material_in_item_proc' => $this->id_material_in_item_proc,
            'id_material_in' => $this->id_material_in,
            */
            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $query->groupBy('id_material, id_material_kategori1, id_material_kategori2, yard, id_gudang');

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function searchGroupByKategori3($params)
    {
        $query = MaterialFinish::find();
        $query->select('id_material, id_gudang, id_material_kategori1,id_material_kategori2, id_material_kategori3, COUNT(id_material_finish) as jumlah, MAX(id_material_finish)');

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
            'id_material_finish' => $this->id_material_finish,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,
            /*
            'yard' => $this->yard,
            'year' => $this->year,
            'no_urut' => $this->no_urut,
            'is_packing' => $this->is_packing,
            'id_basic_packing' => $this->id_basic_packing,
            'id_material_in_item_proc' => $this->id_material_in_item_proc,
            'id_material_in' => $this->id_material_in,
            */
            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $query->groupBy('id_material, id_material_kategori1, id_material_kategori2, id_material_kategori3,id_gudang');

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }


    public function searchGroupByKategori3Yard($params)
    {
        $query = MaterialFinish::find();
        $query->select('id_material, id_gudang, yard, id_material_kategori1,id_material_kategori2, id_material_kategori3, COUNT(id_material_finish) as jumlah, yard*COUNT(id_material_finish) as total_yard, MAX(id_material_finish)');

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
            'id_material_finish' => $this->id_material_finish,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,

            'yard' => $this->yard,
            /*
            'year' => $this->year,
            'no_urut' => $this->no_urut,
            'is_packing' => $this->is_packing,
            'id_basic_packing' => $this->id_basic_packing,
            'id_material_in_item_proc' => $this->id_material_in_item_proc,
            'id_material_in' => $this->id_material_in,
            */
            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $query->groupBy('id_material, id_material_kategori1, id_material_kategori2, id_material_kategori3, yard, id_gudang');

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function searchGroupByDuplicateBarcode($params)
    {
        $query = MaterialFinish::find();
        $query->select('barcode_kode, count(barcode_kode) as jumlah');

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

        /*
        // grid filtering conditions
        $query->andFilterWhere([
            'id_material_finish' => $this->id_material_finish,
            'id_material' => $this->id_material,
            'id_material_kategori1' => $this->id_material_kategori1,
            'id_material_kategori2' => $this->id_material_kategori2,
            'id_material_kategori3' => $this->id_material_kategori3,

            'id_gudang' => $this->id_gudang,
            'created_id_user' => $this->created_id_user,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'no_urut_kode', $this->no_urut_kode])
            ->andFilterWhere(['like', 'barcode_kode', $this->barcode_kode])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);
            */
        //$query->where('material_finish.jumlah > :id', [':id' => '2']);
        $query->having("jumlah > 1");

        $query->groupBy('barcode_kode');

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }

}
