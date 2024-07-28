<?php

namespace backend\controllers;

use common\utils\EncryptionDB;
use Yii;
use backend\models\AssetItemTrackingDevice;
use backend\models\AssetItemTrackingDeviceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssetItemTrackingDeviceController implements the CRUD actions for AssetItemTrackingDevice model.
 */
class AssetItemTrackingDeviceController extends Controller
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
     * Lists all AssetItemTrackingDevice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetItemTrackingDeviceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMap()
    {
        //$searchModel = new AssetItemTrackingDeviceSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('map', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AssetItemTrackingDevice model.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($c)
    {
        $id_tracking_device = EncryptionDB::encryptor('decrypt', $c);

        return $this->render('view', [
            'model' => $this->findModel($id_tracking_device),
        ]);
    }

    /**
     * Creates a new AssetItemTrackingDevice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AssetItemTrackingDevice();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_item_tracking_device]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AssetItemTrackingDevice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($c)
    {
        $id_tracking_device = EncryptionDB::encryptor('decrypt', $c);
        $model = $this->findModel($id_tracking_device);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_item_tracking_device]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AssetItemTrackingDevice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($c)
    {
        $id_delete= EncryptionDB::encryptor('decrypt', $c);
        $this->findModel($id_delete)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AssetItemTrackingDevice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssetItemTrackingDevice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssetItemTrackingDevice::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
