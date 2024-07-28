<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HrmAbsensiPegawai;

/**
 * HrmAbsensiPegawaiSearch represents the model behind the search form of `backend\models\HrmAbsensiPegawai`.
 */
class HrmAbsensiPegawaiSearch extends HrmAbsensiPegawai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hrm_absensi_pegawai', 'id_pegawai', 'id_mst_jenis_absensi', 'total_menit_kerja', 'created_id_user', 'modified_id_user'], 'integer'],
            [['tanggal_absen', 'waktu_login', 'waktu_logout', 'izin_antara_logout', 'izin_antara_login', 'created_date', 'created_ip_address', 'modified_date', 'modified_ip_address'], 'safe'],
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
        $query = HrmAbsensiPegawai::find();

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
            'id_hrm_absensi_pegawai' => $this->id_hrm_absensi_pegawai,
            'id_pegawai' => $this->id_pegawai,
            'tanggal_absen' => $this->tanggal_absen,
            'id_mst_jenis_absensi' => $this->id_mst_jenis_absensi,
            'waktu_login' => $this->waktu_login,
            'waktu_logout' => $this->waktu_logout,
            'izin_antara_logout' => $this->izin_antara_logout,
            'izin_antara_login' => $this->izin_antara_login,
            'total_menit_kerja' => $this->total_menit_kerja,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
            'modified_date' => $this->modified_date,
            'modified_id_user' => $this->modified_id_user,
        ]);

        $query->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address])
            ->andFilterWhere(['like', 'modified_ip_address', $this->modified_ip_address]);

        return $dataProvider;
    }
}
