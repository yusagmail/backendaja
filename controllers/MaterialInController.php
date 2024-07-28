<?php

namespace backend\controllers;

use Yii;
use backend\models\MaterialIn;
use backend\models\MaterialInSearch;
use backend\models\MaterialInItemProc;
use backend\models\MaterialInItemProcSearch;
use backend\models\MaterialFinish;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialInController implements the CRUD actions for MaterialIn model.
 */
class MaterialInController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MaterialIn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaterialInSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionRekapitulasiMaterial()
    {
        $searchModel = new MaterialInSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //Menghitung total rekapitulasi per material
        $models = $dataProvider->getModels();
        $total_yard_awal = 0;
        $total_yard_hasil = 0;
        $total_buang = 0;
        $total_selisih_kurang = 0;
        $total_selisih_lebih = 0;
        foreach ($models as $model) {
            //echo $model->yard_awal." ";
            $total_yard_awal = $total_yard_awal + $model->total_yard_awal;
            $total_yard_hasil = $total_yard_hasil + $model->total_yard_hasil;
            $total_buang = $total_buang + $model->total_buang;
        }

        // echo $total_yard_awal." <br>";
        // echo $total_yard_hasil." <br>";
        // echo $total_buang." <br>";


        return $this->render('rekapitulasi-material2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'total_yard_awal' => $total_yard_awal,
            'total_yard_hasil' => $total_yard_hasil,
            'total_buang' => $total_buang,
            'total_selisih_kurang' => $total_selisih_kurang,
            'total_selisih_lebih' => $total_selisih_lebih,
        ]);
    }


    public function actionLaporanHarian()
    {
        $searchModel = new MaterialInSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        /*
SELECT b.tanggal_proses, count(a.id_material_in_item_proc) as jml_transaksi,
SUM(a.yard_awal) as total_yard_awal,
SUM(a.yard_hasil1) as total_yard_hasil1,
SUM(a.yard_hasil2) as total_yard_hasil2,
SUM(a.yard_hasil3) as total_yard_hasil3,
SUM(a.yard_hasil4) as total_yard_hasil4,
SUM(a.yard_hasil5) as total_yard_hasil5,
SUM(a.yard_hasil6) as total_yard_hasil6
FROM `material_in_item_proc` a
LEFT JOIN material_in b on a.id_material_in = b.id_material_in
group by b.tanggal_proses
        */
        $query = new yii\db\Query();
        $query->select('material_in.tanggal_proses, 
                count(material_in_item_proc.id_material_in_item_proc) as jml_transaksi,
                SUM(material_in_item_proc.yard_awal) as total_yard_awal,
                (SUM(material_in_item_proc.yard_hasil1) +
                    SUM(material_in_item_proc.yard_hasil2) +
                    SUM(material_in_item_proc.yard_hasil3) +
                    SUM(material_in_item_proc.yard_hasil4) +
                    SUM(material_in_item_proc.yard_hasil5) +
                    SUM(material_in_item_proc.yard_hasil6) +
                    SUM(material_in_item_proc.yard_hasil7) +
                    SUM(material_in_item_proc.yard_hasil8) +
                    SUM(material_in_item_proc.yard_hasil9) +
                    SUM(material_in_item_proc.yard_hasil10)) as total_yard_hasil,

                (SUM(material_in_item_proc.buang1) +
                    SUM(material_in_item_proc.buang2)) as total_buang

                ')
            ->from('material_in_item_proc');

        $query->join = [
            ['LEFT JOIN', 'material_in', 'material_in_item_proc.id_material_in = material_in.id_material_in'],
            //['LEFT JOIN', 'test_group', 'patient_test.test_group_id = test_group.id']
        ];

        $query->groupBy(['material_in.tanggal_proses']);
        $query->orderBy('material_in.tanggal_proses DESC');

        $pagination = 10;
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);

        //Menghitung total rekapitulasi per material

        $total_yard_awal = 0;
        $total_yard_hasil = 0;
        $total_buang = 0;
        $total_selisih_kurang = 0;
        $total_selisih_lebih = 0;


        return $this->render('laporan/laporan-harian', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'total_yard_awal' => $total_yard_awal,
            'total_yard_hasil' => $total_yard_hasil,
            'total_buang' => $total_buang,
            'total_selisih_kurang' => $total_selisih_kurang,
            'total_selisih_lebih' => $total_selisih_lebih,
        ]);
    }

    public function actionLaporanHarianDetail($tanggal_proses)
    {
        $searchModel = new MaterialInItemProcSearch();
        //$searchModel->tanggal_proses = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = new yii\db\Query();
        $query->select('*')
            ->from('material_in_item_proc');

        $query->join = [
            ['LEFT JOIN', 'material_in', 'material_in_item_proc.id_material_in = material_in.id_material_in'],
            ['LEFT JOIN', 'material', 'material_in.id_material = material.id_material'],
        ];
        $query->andFilterWhere([
            'material_in.tanggal_proses' => $tanggal_proses,
        ]);

        $pagination = 10;
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);

        return $this->render('laporan/laporan-harian-detail', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tanggal_proses' => $tanggal_proses,
        ]);
    }

    public function actionLaporanBulanan()
    {
        $searchModel = new MaterialInSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = new yii\db\Query();
        $query->select('EXTRACT(YEAR_MONTH FROM material_in.tanggal_proses) as tanggal_proses, 
                count(material_in_item_proc.id_material_in_item_proc) as jml_transaksi,
                SUM(material_in_item_proc.yard_awal) as total_yard_awal,
                (SUM(material_in_item_proc.yard_hasil1) +
                    SUM(material_in_item_proc.yard_hasil2) +
                    SUM(material_in_item_proc.yard_hasil3) +
                    SUM(material_in_item_proc.yard_hasil4) +
                    SUM(material_in_item_proc.yard_hasil5) +
                    SUM(material_in_item_proc.yard_hasil6) +
                    SUM(material_in_item_proc.yard_hasil7) +
                    SUM(material_in_item_proc.yard_hasil8) +
                    SUM(material_in_item_proc.yard_hasil9) +
                    SUM(material_in_item_proc.yard_hasil10)) as total_yard_hasil,
                
                (SUM(material_in_item_proc.buang1) +
                    SUM(material_in_item_proc.buang2)) as total_buang
                
                ')
            ->from('material_in_item_proc');

        $query->join = [
            ['LEFT JOIN', 'material_in', 'material_in_item_proc.id_material_in = material_in.id_material_in'],
            //['LEFT JOIN', 'test_group', 'patient_test.test_group_id = test_group.id']
        ];

        $query->groupBy(['MONTH(material_in.tanggal_proses)']);
        $query->orderBy('MONTH(material_in.tanggal_proses) DESC');

        $pagination = 10;
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]]
        ]);

        //Menghitung total rekapitulasi per material

        $total_yard_awal = 0;
        $total_yard_hasil = 0;
        $total_buang = 0;
        $total_selisih_kurang = 0;
        $total_selisih_lebih = 0;


        return $this->render('laporan/laporan-bulanan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'total_yard_awal' => $total_yard_awal,
            'total_yard_hasil' => $total_yard_hasil,
            'total_buang' => $total_buang,
            'total_selisih_kurang' => $total_selisih_kurang,
            'total_selisih_lebih' => $total_selisih_lebih,
        ]);
    }

    public function actionLaporanBulananDetail($tanggal_proses)
    {
        $searchModel = new MaterialInItemProcSearch();
        //$searchModel->tanggal_proses = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = new yii\db\Query();
        $query->select('*')
            ->from('material_in_item_proc');

        $query->join = [
            ['LEFT JOIN', 'material_in', 'material_in_item_proc.id_material_in = material_in.id_material_in'],
        ];
        $query->andFilterWhere([
            'EXTRACT(YEAR_MONTH FROM material_in.tanggal_proses)' => $tanggal_proses,
        ]);

        $pagination = 10;
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);

        return $this->render('laporan/laporan-bulanan-detail', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tanggal_proses' => $tanggal_proses,
        ]);
    }

    public function actionLaporanTahunan()
    {
        $searchModel = new MaterialInSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = new yii\db\Query();
        $query->select('EXTRACT(YEAR FROM material_in.tanggal_proses) as tanggal_proses, 
                count(material_in_item_proc.id_material_in_item_proc) as jml_transaksi,
                SUM(material_in_item_proc.yard_awal) as total_yard_awal,
                (SUM(material_in_item_proc.yard_hasil1) +
                    SUM(material_in_item_proc.yard_hasil2) +
                    SUM(material_in_item_proc.yard_hasil3) +
                    SUM(material_in_item_proc.yard_hasil4) +
                    SUM(material_in_item_proc.yard_hasil5) +
                    SUM(material_in_item_proc.yard_hasil6) +
                    SUM(material_in_item_proc.yard_hasil7) +
                    SUM(material_in_item_proc.yard_hasil8) +
                    SUM(material_in_item_proc.yard_hasil9) +
                    SUM(material_in_item_proc.yard_hasil10)) as total_yard_hasil,
                
                (SUM(material_in_item_proc.buang1) +
                    SUM(material_in_item_proc.buang2)) as total_buang
                
                ')
        ->from('material_in_item_proc');

        $query->join = [
            ['LEFT JOIN', 'material_in', 'material_in_item_proc.id_material_in = material_in.id_material_in'],
            //['LEFT JOIN', 'test_group', 'patient_test.test_group_id = test_group.id']
        ];

        $query->groupBy(['YEAR(material_in.tanggal_proses)']);
        $query->orderBy('YEAR(material_in.tanggal_proses) DESC');

        $pagination = 10;
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]]
        ]);

        //Menghitung total rekapitulasi per material

        $total_yard_awal = 0;
        $total_yard_hasil = 0;
        $total_buang = 0;
        $total_selisih_kurang = 0;
        $total_selisih_lebih = 0;


        return $this->render('laporan/laporan-tahunan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'total_yard_awal' => $total_yard_awal,
            'total_yard_hasil' => $total_yard_hasil,
            'total_buang' => $total_buang,
            'total_selisih_kurang' => $total_selisih_kurang,
            'total_selisih_lebih' => $total_selisih_lebih,
        ]);
    }

    public function actionLaporanTahunanDetail($tanggal_proses)
    {
        $searchModel = new MaterialInItemProcSearch();
        //$searchModel->tanggal_proses = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = new yii\db\Query();
        $query->select('*')
            ->from('material_in_item_proc');

        $query->join = [
            ['LEFT JOIN', 'material_in', 'material_in_item_proc.id_material_in = material_in.id_material_in'],
        ];
        $query->andFilterWhere([
            'EXTRACT(YEAR FROM material_in.tanggal_proses)' => $tanggal_proses,
        ]);

        $pagination = 10;
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);

        return $this->render('laporan/laporan-tahunan-detail', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tanggal_proses' => $tanggal_proses,
        ]);
    }

    /**
     * Displays a single MaterialIn model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //Ini Item Proc
        $searchModel = new MaterialInItemProcSearch();
        $searchModel->id_material_in = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;

        //Menghitung total rekapitulasi per material
        $models = $dataProvider->getModels();
        $total_yard_awal = 0;
        $total_yard_hasil = 0;
        $total_buang = 0;
        $total_selisih_lebih = 0;
        $total_selisih_kurang = 0;

        foreach ($models as $model) {
            //echo $model->yard_awal." ";
            $total_yard_awal = $total_yard_awal + $model->yard_awal;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil1;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil2;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil3;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil4;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil5;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil6;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil7;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil8;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil9;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil10;
            $total_buang = $total_buang + $model->buang1;
            $total_buang = $total_buang + $model->buang2;

            if ($model->yard_hasil1 > $model->yard_awal) {
                $model->selisih_lebih = ($model->yard_hasil1 + $model->yard_hasil2 + $model->yard_hasil3 + $model->yard_hasil4 + $model->yard_hasil5 + $model->yard_hasil6 + $model->yard_hasil7 + $model->yard_hasil8 + $model->yard_hasil9 + $model->yard_hasil10 + $model->buang1 + $model->buang2) - $model->yard_awal;
            } elseif ($model->yard_hasil1 < $model->yard_awal) {
                $model->selisih_kurang = $model->yard_awal - ($model->yard_hasil1 + $model->yard_hasil2 + $model->yard_hasil3 + $model->yard_hasil4 + $model->yard_hasil5 + $model->yard_hasil6 + $model->yard_hasil7 + $model->yard_hasil8 + $model->yard_hasil9 + $model->yard_hasil10 + $model->buang1 + $model->buang2);
            } else {
                $model->selisih_lebih = 0;
                $model->selisih_kurang = 0;
            }

            $total_selisih_lebih = $total_selisih_lebih + $model->selisih_lebih;
            $total_selisih_kurang = $total_selisih_kurang + $model->selisih_kurang;
        }

        //echo "<br>".$total_yard_awal;
        //echo "<br>".$total_yard_hasil;
        //echo "<br>".$total_buang;


        //Proses untuk menyimpan hasil ke dalam database
        $model = $this->findModel($id);
        $model->total_yard_awal = $total_yard_awal;
        $model->total_yard_hasil = $total_yard_hasil;
        $model->total_buang = $total_buang;
        $model->save(false); //Sace tanpa validasi

        return $this->render('view2', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'total_yard_awal' => $total_yard_awal,
            'total_yard_hasil' => $total_yard_hasil,
            'total_buang' => $total_buang,
            'total_selisih_kurang' => $total_selisih_kurang,
            'total_selisih_lebih' => $total_selisih_lebih,
        ]);
    }

    public function actionViewItem($id_item)
    {
        //Ini Item Proc
        $searchModel = new MaterialInItemProcSearch();
        $searchModel->id_material_in = $id_item;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //Menghitung total rekapitulasi per material
        $models = $dataProvider->getModels();
        $total_yard_awal = 0;
        $total_yard_hasil = 0;
        $total_buang = 0;
        foreach ($models as $model) {
            //echo $model->yard_awal." ";
            $total_yard_awal = $total_yard_awal + $model->yard_awal;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil1;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil2;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil3;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil4;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil5;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil6;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil7;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil8;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil9;
            $total_yard_hasil = $total_yard_hasil + $model->yard_hasil10;
            $total_buang = $total_buang + $model->buang1;
            $total_buang = $total_buang + $model->buang2;
        }
        //echo "<br>".$total_yard_awal;
        //echo "<br>".$total_yard_hasil;
        //echo "<br>".$total_buang;

        //Proses untuk menyimpan hasil ke dalam database
        $model = $this->findModelItem($id_item);
        // $model->total_yard_awal = $total_yard_awal;
        // $model->total_yard_hasil = $total_yard_hasil;
        // $model->total_buang = $total_buang;
        $model->save(false); //Sace tanpa validasi

        return $this->render('/material-in/item/view_add', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id_item,
            'total_yard_awal' => $total_yard_awal,
            'total_yard_hasil' => $total_yard_hasil,
            'total_buang' => $total_buang,
        ]);
    }

    /**
     * Creates a new MaterialIn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaterialIn();

        //Diberikan default value tanggal hari ini
        $model->tanggal_proses = \common\helpers\Timeanddate::getCurrentDate();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Simpan data-data Surat Jalan (Delivery Order)
             $mod_do = new \backend\models\SupplierDeliveryOrder();
             $mod_do->id_supplier = $model->id_supplier;
             $mod_do->nomor_surat_jalan = $model->nomor_surat_jalan;
             $mod_do->tanggal_surat_jalan = $model->tanggal_surat_jalan;
             $mod_do->catatan = $model->catatan;
             $mod_do->save(false);

             //Update ID
             $model->id_supplier_delivery_order = $mod_do->id_supplier_delivery_order;
             $model->save(false);

            return $this->redirect(['view', 'id' => $model->id_material_in]);
        }

        return $this->render('create2', [
            'model' => $model,
        ]);
    }

    public function actionCreateAdv()
    {
        $model = new MaterialIn();

        $session = Yii::$app->session;
        $url_current = Yii::$app->request->url; //Yii::$app->request->referrer;
        $session->set('main-requestor', $url_current);
        $session->set('form-type', "pop-up");

        //Diberikan default value tanggal hari ini
        $model->tanggal_proses = \common\helpers\Timeanddate::getCurrentDate();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Simpan data-data Surat Jalan (Delivery Order)
             $mod_do = new \backend\models\SupplierDeliveryOrder();
             $mod_do->id_supplier = $model->id_supplier;
             $mod_do->nomor_surat_jalan = $model->nomor_surat_jalan;
             $mod_do->tanggal_surat_jalan = $model->tanggal_surat_jalan;
             $mod_do->catatan = $model->catatan;
             $mod_do->save(false);

             //Update ID
             $model->id_supplier_delivery_order = $mod_do->id_supplier_delivery_order;
             
             $model = \common\helpers\LogHelper::setCreatedLog2($model);
             $model->save(false);

            return $this->redirect(['view', 'id' => $model->id_material_in]);
        }

        /*
        $session = Yii::$app->session;
        $url_current = Yii::$app->request->referrer;
        $session->set('main-requestor', $url_current);
        */

        return $this->render('create-adv', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MaterialIn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Update DO
            if (($mod_do = \backend\models\SupplierDeliveryOrder::findOne($model->id_supplier_delivery_order)) !== null) {
                $mod_do->id_supplier = $model->id_supplier;
                $mod_do->nomor_surat_jalan = $model->nomor_surat_jalan;
                $mod_do->tanggal_surat_jalan = $model->tanggal_surat_jalan;
                $mod_do->catatan = $model->catatan;
                $mod_do->save(false);
            }


            return $this->redirect(['view', 'id' => $model->id_material_in]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdateItem($id_item, $id_parent)
    {
        $model = $this->findModelItem($id_item);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $id_parent]);
        }

        //return $this->render('/material-in/item/create_add_mode3', [
        return $this->render('/material-in/item/create_add2', [
            'model' => $model,
        ]);
    }


    public function actionUpdatePacking($id_item, $id_parent)
    {
        $model = $this->findModelItem($id_item);
        $parent = $this->findModel($id_parent);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Generate Material Finish
            for ($i=1;$i<=10;$i++){
                $field_yard_hasil = 'yard_hasil'.$i;
                $field_basic_packing = 'id_basic_packing'.$i;
                $field_material_finish = 'id_material_finish'.$i;
                if($model->$field_yard_hasil > 0){
                    if($model->$field_basic_packing > 0){
                        $matfinish =  MaterialFinish::find()
                            ->where(['id_material_in_item_proc' => $model->id_material_in_item_proc,
                                 'no_splitting' => $i,   
                                ])
                            ->one();
                        if($matfinish != null){

                        }else{
                            $matfinish = new MaterialFinish();
                        }
                        
                        $matfinish->id_material = $parent->id_material;
                        $matfinish->id_material_kategori1 = $parent->id_material_kategori1;
                        $matfinish->id_material_kategori2 = $parent->id_material_kategori2;
                        $matfinish->id_material_kategori3 = $parent->id_material_kategori3;
                        $matfinish->yard = $model->$field_yard_hasil;

                        $matfinish->id_basic_packing = 1;
                        $matfinish->no_splitting = $i;
                        $matfinish->year = date("Y");

                        //Parent Key
                        $matfinish->is_packing = 1;
                        $matfinish->id_material_in_item_proc = $model->id_material_in_item_proc;
                        $matfinish->id_material_in = $parent->id_material_in;

                        //Gudang 
                        $id_gudang = \backend\models\AppSettingSearch::getValueByKey("GUDANG-DEFAULT");
                        $matfinish->id_gudang = $id_gudang;

                        $matfinish->save(false);

                        //Generate Key
                        if($matfinish->is_join_packing != 1){
                            $matfinish->genereateNomorUrut();
                            $matfinish->save(false);
                        }

                        //Simpan balik ke material proc
                        $model->$field_material_finish = $matfinish->id_material_finish;
                        $model->save(false);
                    }else{
                        //Hapus Material Finish jika belum packing
                        $matfinish =  MaterialFinish::find()
                            ->where(['id_material_in_item_proc' => $model->id_material_in_item_proc,
                                 'no_splitting' => $i,   
                                ])
                            ->one();
                        if($matfinish != null){
                            $matfinish->delete();
                        }

                        //Hapus juga di bagian material proc
                        $model->$field_material_finish = 0;
                        $model->save(false);
                    }
                }
            }

            return $this->redirect(['view', 'id' => $id_parent]);
        }

        //return $this->render('/material-in/item/create_add_mode3', [
        return $this->render('/material-in/item/update_packing2', [
            'model' => $model,
            'id_parent' =>$id_parent,
        ]);
    }

    public function actionJoinPacking($ip)
    {
        $searchModel = new MaterialInItemProcSearch();
        $searchModel->id_material_in = $ip;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;

        $parent = $this->findModel($ip);

        if (\Yii::$app->request->isPost) {
            $models = $dataProvider->getModels();
            $statusSaveToMaterialFinish = false;
            $matfinish_id_material_finish = 0;

            $id_bs_pack = 0;
            if(isset($_POST['MaterialInItemProc'])){
                $ibs = $_POST['MaterialInItemProc'];
                if(isset($ibs['id_basic_packing'])){
                    $id_bs_pack = $ibs['id_basic_packing'];
                }
            }

            $join_info = "";
            $total_join = 0;
            foreach ($models as $model) {
                //echo $model->id_material_in_item_proc." <br>";
                for($i=1;$i<=10;$i++){
                    $field = "join-check-".$model->id_material_in_item_proc."-".$i;
                    $field_yard_hasil = 'yard_hasil'.$i;
                    $field_basic_packing = 'id_basic_packing'.$i;
                    $field_material_finish = 'id_material_finish'.$i;
                    if(isset($_POST[$field])){
                        //echo $_POST[$field]."--<br>";
                        //Simpan hasilnya dalam 1 material-finish
                        if($statusSaveToMaterialFinish == false){
                            //Simpan hasilnya dalam 1 material finish
                            $matfinish =  MaterialFinish::find()
                                ->where(['id_material_in_item_proc' => $model->id_material_in_item_proc,
                                     'no_splitting' => $i,   
                                    ])
                                ->one();
                            if($matfinish != null){

                            }else{
                                $matfinish = new MaterialFinish();
                            }
                            
                            $matfinish->id_material = $parent->id_material;
                            $matfinish->id_material_kategori1 = $parent->id_material_kategori1;
                            $matfinish->id_material_kategori2 = $parent->id_material_kategori2;
                            $matfinish->id_material_kategori3 = $parent->id_material_kategori3;
                            $matfinish->yard = $model->$field_yard_hasil;

                            $join_info .=  $model->$field_yard_hasil;
                            $total_join +=  $model->$field_yard_hasil;

                            $matfinish->id_basic_packing = $id_bs_pack;
                            $matfinish->no_splitting = $i;
                            $matfinish->year = date("Y");

                            //Parent Key
                            $matfinish->is_packing = 1;
                            $matfinish->id_material_in_item_proc = $model->id_material_in_item_proc;
                            $matfinish->id_material_in = $parent->id_material_in;

                            //Gudang 
                            $id_gudang = \backend\models\AppSettingSearch::getValueByKey("GUDANG-DEFAULT");
                            $matfinish->id_gudang = $id_gudang;

                            $matfinish->save(false);
                            $matfinish->is_join_packing = 1;
                            //Generate Key
                            $matfinish->genereateNomorUrut();
                            $matfinish->save(false);

                            $statusSaveToMaterialFinish = true;

                             //Simpan balik ke material proc
                            $model->$field_material_finish = $matfinish->id_material_finish;
                            $matfinish_id_material_finish = $matfinish->id_material_finish;
                            $model->$field_basic_packing = $id_bs_pack;
                            $model->save(false);
                        }else{
                            $model->$field_material_finish = $matfinish_id_material_finish;
                            $model->$field_basic_packing = $id_bs_pack;
                            $model->save(false);
                            
                            $join_info .=  " + ".$model->$field_yard_hasil;
                            $total_join +=  $model->$field_yard_hasil;
                            $matfinish->join_info = $join_info;
                            $matfinish->yard = $total_join;
                            $matfinish->save(false);
                        }
                    }
                }
            }



            return $this->redirect(['view', 'id' => $ip]);
        }

        //return $this->render('/material-in/item/join-packing', [
        return $this->render('/material-in/item/join-packingh10', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ip'=>$ip,
        ]);
    }

    /*
    $ip = id parent ($id_material_in)
    */
    public function actionCreateItem($ip)
    {
        $model = new MaterialInItemProc();
        $model->id_material_in = $ip;

        $model->yard_awal = 0;
        $model->yard_hasil1 = 0;
        $model->yard_hasil2 = 0;
        $model->yard_hasil3 = 0;
        $model->yard_hasil4 = 0;
        $model->yard_hasil5 = 0;
        $model->yard_hasil6 = 0;
        $model->yard_hasil7 = 0;
        $model->yard_hasil8 = 0;
        $model->yard_hasil9 = 0;
        $model->yard_hasil10 = 0;
        $model->buang1 = 0;
        $model->buang2 = 0;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->generateBarcodeNumber();
            return $this->redirect(['view', 'id' => $ip]);
        }

       $request = Yii::$app->request;
        if ($request->isAjax) {
            return $this->renderAjax('/material-in/item/create_add2', [
                'model' => $model,
            ]);
        } else {
            return $this->render('/material-in/item/create_add2', [
                'model' => $model,
            ]);
        }


    }

    public function actionGenerateBarcode($id_item, $id_parent)
    {
        return $this->render('/material-in/barcode/generate-barcode', [
            'id_item' => $id_item,
            'id_parent' => $id_parent
        ]);
    }

    public function actionGenerateBarcodeNew($id_item, $id_parent)
    {
        return $this->render('/material-in/barcode/generate-barcode-new', [
            'id_item' => $id_item,
            'id_parent' => $id_parent
        ]);
    }

    public function actionGenerateBarcodeMaterial($id_item, $id_parent, $label)
    {
        $model = $this->findModelItem($id_item);

        return $this->render('/material-in/barcode/generate-barcode-material', [
            'id_item' => $id_item,
            'id_parent' => $id_parent,
            'model' => $model,
            'label' => $label,
        ]);
    }


    /**
     * Deletes an existing MaterialIn model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MaterialIn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaterialIn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaterialIn::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDeleteItem($id_item, $id_parent)
    {

        $model = $this->findModelItem($id_item);

        //Delete yang ada di material finish;
        if (($modelmatfinish = MaterialFinish::findOne($model->id_material_finish1)) !== null) {
            $modelmatfinish->delete();
        }
        if (($modelmatfinish = MaterialFinish::findOne($model->id_material_finish2)) !== null) {
            $modelmatfinish->delete();
        }
        if (($modelmatfinish = MaterialFinish::findOne($model->id_material_finish3)) !== null) {
            $modelmatfinish->delete();
        }
        if (($modelmatfinish = MaterialFinish::findOne($model->id_material_finish4)) !== null) {
            $modelmatfinish->delete();
        }
        if (($modelmatfinish = MaterialFinish::findOne($model->id_material_finish5)) !== null) {
            $modelmatfinish->delete();
        }
        if (($modelmatfinish = MaterialFinish::findOne($model->id_material_finish6)) !== null) {
            $modelmatfinish->delete();
        }

        $this->findModelItem($id_item)->delete();

        return $this->redirect(['view', 'id' => $id_parent]);
    }

    /**
     * Finds the MaterialInItemProc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaterialInItemProc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelItem($id)
    {
        if (($model = MaterialInItemProc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelMaterialFinish($id)
    {
        if (($model = MaterialInItemProc::findOne($id)) !== null) {
            return $model;
        }
    }
}
