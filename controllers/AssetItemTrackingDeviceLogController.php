<?php

namespace backend\controllers;

use common\utils\EncryptionDB;
use Yii;
use backend\models\AssetItemTrackingDeviceLog;
use backend\models\AssetItemTrackingDeviceLogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssetItemTrackingDeviceLogController implements the CRUD actions for AssetItemTrackingDeviceLog model.
 */
class AssetItemTrackingDeviceLogController extends Controller
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
     * Lists all AssetItemTrackingDeviceLog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetItemTrackingDeviceLogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AssetItemTrackingDeviceLog model.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($c)
    {
        $id_tracking_device_log = EncryptionDB::encryptor('decrypt', $c);
        return $this->render('view', [
            'model' => $this->findModel($id_tracking_device_log),
        ]);
    }

    /**
     * Creates a new AssetItemTrackingDeviceLog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AssetItemTrackingDeviceLog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_item_tracking_device_log]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AssetItemTrackingDeviceLog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($c)
    {
        $id_tracking_device_log = EncryptionDB::encryptor('decrypt', $c);
        $model = $this->findModel($id_tracking_device_log);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_item_tracking_device_log]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AssetItemTrackingDeviceLog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($c)
    {
        $id_tracking_device_log = EncryptionDB::encryptor('decrypt', $c);
        $this->findModel($id_tracking_device_log)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AssetItemTrackingDeviceLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssetItemTrackingDeviceLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssetItemTrackingDeviceLog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
