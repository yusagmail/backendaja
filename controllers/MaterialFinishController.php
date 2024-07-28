<?php

namespace backend\controllers;

use Yii;
use backend\models\MaterialFinish;
use backend\models\MaterialFinishSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\MaterialFinishDelete;
use backend\models\MaterialFinishDeleteSearch;
/**
 * MaterialFinishController implements the CRUD actions for MaterialFinish model.
 */
class MaterialFinishController extends Controller
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
     * Lists all MaterialFinish models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaterialFinishSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexFull()
    {
        $searchModel = new MaterialFinishSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index-full', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexHistoryMoving()
    {
        $searchModel = new MaterialFinishSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index-history-moving', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexMutasiQuick()
    {
        $searchModel = new MaterialFinishSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-mutasi-quick', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRekapitulasiStok($t = 1)
    {
        $searchModel = new MaterialFinishSearch();
        $dataProvider = $searchModel->searchGroupBy(Yii::$app->request->queryParams);
        $t = $t * 1;

        $models = $dataProvider->getModels();

        $total_roll = 0;
        $jenis_kain = 0;

        foreach ($models as $model) {
            $total_roll += $model->jumlah;
            $jenis_kain++;
        }

        return $this->render('rekapitulasi/rekapitulasi', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'total_roll' => $total_roll,
            'jenis_kain' => $jenis_kain,
            'models' => $models,
            't' => $t
        ]);
    }

    public function actionRekapitulasiStokYard($t = 1)
    {
        $searchModel = new MaterialFinishSearch();
        $dataProvider = $searchModel->searchGroupByYard(Yii::$app->request->queryParams);
        $t = $t * 1;

        $models = $dataProvider->getModels();

        $total_roll = 0;
        $jenis_kain = 0;
        $total_yard_akhir = 0;

        foreach ($models as $model) {
            $total_roll += $model->jumlah;
            $total_yard_akhir += $model->total_yard;
            $jenis_kain++;
        }

        return $this->render('rekapitulasi-yard/rekapitulasi', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'total_roll' => $total_roll,
            'jenis_kain' => $jenis_kain,
            'total_yard_akhir' => $total_yard_akhir,
            'models' => $models,
            't' => $t
        ]);
    }

    public function actionRekapitulasiStokDetail($im, $ig)
    {
        $searchModel = new MaterialFinishSearch();
        $searchModel->id_material = $im;
        $searchModel->id_gudang = $ig;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('rekapitulasi/rekapitulasi-stok-detail', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRekapitulasiStokDetailYard($im, $ig, $yard)
    {
        $searchModel = new MaterialFinishSearch();
        $searchModel->id_material = $im;
        $searchModel->id_gudang = $ig;
        $searchModel->yard = $yard;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('rekapitulasi-yard/rekapitulasi-stok-detail', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRekapitulasiStokDetailKat1($im, $ig, $ik1)
    {
        $searchModel = new MaterialFinishSearch();
        $searchModel->id_material = $im;
        $searchModel->id_gudang = $ig;
        $searchModel->id_material_kategori1 = $ik1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('rekapitulasi/rekapitulasi-stok-detail-kat1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRekapitulasiStokDetailKat1Yard($im, $ig, $ik1, $yard)
    {
        $searchModel = new MaterialFinishSearch();
        $searchModel->id_material = $im;
        $searchModel->id_gudang = $ig;
        $searchModel->id_material_kategori1 = $ik1;
        $searchModel->yard = $yard;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('rekapitulasi-yard/rekapitulasi-stok-detail-kat1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRekapitulasiStokDetailKat2($im, $ig, $ik1, $ik2)
    {
        $searchModel = new MaterialFinishSearch();
        $searchModel->id_material = $im;
        $searchModel->id_gudang = $ig;
        $searchModel->id_material_kategori1 = $ik1;
        $searchModel->id_material_kategori2 = $ik2;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('rekapitulasi/rekapitulasi-stok-detail-kat2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRekapitulasiStokDetailKat2Yard($im, $ig, $ik1, $ik2, $yard)
    {
        $searchModel = new MaterialFinishSearch();
        $searchModel->id_material = $im;
        $searchModel->id_gudang = $ig;
        $searchModel->id_material_kategori1 = $ik1;
        $searchModel->id_material_kategori2 = $ik2;
        $searchModel->yard = $yard;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('rekapitulasi-yard/rekapitulasi-stok-detail-kat2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRekapitulasiStokDetailKat3($im, $ig, $ik1, $ik2, $ik3)
    {
        $searchModel = new MaterialFinishSearch();
        $searchModel->id_material = $im;
        $searchModel->id_gudang = $ig;
        $searchModel->id_material_kategori1 = $ik1;
        $searchModel->id_material_kategori2 = $ik2;
        $searchModel->id_material_kategori3 = $ik3;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('rekapitulasi/rekapitulasi-stok-detail-kat3', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRekapitulasiStokDetailKat3Yard($im, $ig, $ik1, $ik2, $ik3, $yard)
    {
        $searchModel = new MaterialFinishSearch();
        $searchModel->id_material = $im;
        $searchModel->id_gudang = $ig;
        $searchModel->id_material_kategori1 = $ik1;
        $searchModel->id_material_kategori2 = $ik2;
        $searchModel->id_material_kategori3 = $ik3;
        $searchModel->yard = $yard;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('rekapitulasi-yard/rekapitulasi-stok-detail-kat3', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaterialFinish model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    public function actionHistoryMoving($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            return $this->renderAjax('history_moving', [
                'model' => $this->findModel($id),
            ]);
        } else {
            return $this->render('history_moving', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    public function actionCekBarcode()
    {
        return $this->render('cek-barcode/cek-barcode', []);
    }

    public function actionMutasi($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_material_finish]);
            return $this->redirect(['index-mutasi-quick']);
        }

        return $this->render('mutasi', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new MaterialFinish model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaterialFinish();
        $model->is_packing = 1;
        $model->id_material_in_item_proc = 0;
        $model->id_material_in = 0;
        $model->no_urut = 0;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->genereateNomorUrut();
            $model->save(false);

            return $this->redirect(['view', 'id' => $model->id_material_finish]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /*
    Cara menggunakan :
    http://localhost/minierp/administrator/material-finish/gen-barcode?id=1312312312
    */
    public function actionGenBarcode($id){
        //$str = "Barcode";
        //echo str_pad($str,30,"0",STR_PAD_LEFT);
        //echo '<br>';
        $organizationNumber = Yii::$app->params['organization-kode'];
        echo \common\helpers\BarcodeHelper::generateEANProductNumberVer2($id, $organizationNumber);
    }

    /**
     * Updates an existing MaterialFinish model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_material_finish]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionGenerateBarcode($id, $label)
    {
        $model = $this->findModel($id);
        return $this->render('/material-finish/barcode/generate-barcode-material', [
            'id' => $id,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MaterialFinish model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $modeldelete = new MaterialFinishDelete();
        $model = $this->findModel($id);

        if ($modeldelete->load(Yii::$app->request->post()) && $modeldelete->save()) {

            //1. Pindahkan atau copy data-data dari material_finish ke material sales
            $modeldelete->id_material_finish = $model->id_material_finish;
            $modeldelete->id_material = $model->id_material;
            $modeldelete->id_material_kategori1 = $model->id_material_kategori1;
            $modeldelete->id_material_kategori2 = $model->id_material_kategori2;
            $modeldelete->id_material_kategori3 = $model->id_material_kategori3;
            $modeldelete->yard = $model->yard;
            $modeldelete->kode = $model->kode;
            $modeldelete->year = $model->year;
            $modeldelete->no_urut = $model->no_urut;
            $modeldelete->no_urut_kode = $model->no_urut_kode;
            $modeldelete->no_splitting = $model->no_splitting;
            $modeldelete->barcode_kode = $model->barcode_kode;
            $modeldelete->deskripsi = $model->deskripsi;
            $modeldelete->is_packing = $model->is_packing;
            $modeldelete->id_basic_packing = $model->id_basic_packing;
            $modeldelete->id_material_in_item_proc = $model->id_material_in_item_proc;
            $modeldelete->id_material_in = $model->id_material_in;
            $modeldelete->is_join_packing = $model->is_join_packing;
            $modeldelete->join_info = $model->join_info;
            $modeldelete->id_gudang = $model->id_gudang;
            $modeldelete->created_id_user = $model->created_id_user;
            $modeldelete->created_date = $model->created_date;
            $modeldelete->created_ip_address = $model->created_ip_address;

            //Log Date
            $modeldelete->deleted_date = \common\helpers\Timeanddate::getCurrentDateTime();
            $modeldelete->deleted_user_id = Yii::$app->user->identity->id;
            $modeldelete->deleted_ip_address = \common\helpers\IPAddressFunction::getUserIPAddress();

            $modeldelete->save(false);

            //2. Hapus Data yang aslinya
            $model->delete();
            
            return $this->redirect(['index']);
            //return $this->redirect(Yii::$app->request->referrer ?: ['index']);
        }
        return $this->render('delete', [
                'modeldelete' => $modeldelete,
                'model' => $model,
            ]);
        //$this->findModel($id)->delete();

        return $this->redirect(Yii::$app->request->referrer ?: ['index']);
        //return $this->redirect(['index']);
    }

    /**
     * Finds the MaterialFinish model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaterialFinish the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaterialFinish::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
