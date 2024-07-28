<?php

namespace backend\controllers;

use Yii;
use backend\models\BankPembayaran;
use backend\models\BankPembayaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BankPembayaranController implements the CRUD actions for BankPembayaran model.
 */
class AssetNavigationController extends Controller
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

    /*
    Catatan History Pengembangan
    mockup_navigasi6 - versi script sederhana bisa menampilkan garis dan titik secara 3 dimensi, tapi posisi masih di bawah
    mockup_navigasi7 - versi yang dirapikan di dalam navbar, tetapi secara tampilan jadi kurang bagus karena kurang full.
    mockup_navigasi8 - versi awal untuk responsive di layar sentuh, tapi masih suka banyak ngaconya
    
    
    start_begin3 - bisa digambar di sumbu x,y, Titik center bisa diubah-ubah sesuai kebutuhan
    start_begin4 - menambahkan kubus merah di titik pusat
    start_begin5 - kubus merahnya bisa digerakkan dan angle kamera masih tetap sama
    start_begin6 - bis dirotate tetapi dimana saja seusuai posisi tangan
    start_begin8 - bis dirotate dan ketahan di sumbu X
    start_begin9 - rotasi sudah bagus tetapi ketika dimoving masih mengubah posisi kamerate
    start_begin12 - kamera sudah bagus mengikuti, tapi ada bug dari posisi atas. Informasi tentang kamera sudah muncul
    */

    public function actionMockup()
    {
        ///$searchModel = new BankPembayaranSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout = false;
        return $this->render('start_begin13', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all BankPembayaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        ///$searchModel = new BankPembayaranSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        /*
        $this->layout = false;
        return $this->render('mockup_navigasi9_', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
        */
        $searchModel = new \backend\models\SensorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-list-sensor', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFullMap()
    {
        ///$searchModel = new BankPembayaranSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout = false;
        return $this->render('full_map', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BankPembayaran model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BankPembayaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BankPembayaran();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_bank_pembayaran]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BankPembayaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_bank_pembayaran]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BankPembayaran model.
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
     * Finds the BankPembayaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BankPembayaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BankPembayaran::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
