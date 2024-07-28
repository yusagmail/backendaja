<?php

namespace backend\controllers;

use common\utils\EncryptionDB;
use Yii;
use backend\models\AssetItemIncident;
use backend\models\AssetItemIncidentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AssetItemIncidentController implements the CRUD actions for AssetItemIncident model.
 *  @property int $id_asset_item_incident
 */
class AssetItemIncidentController extends Controller
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
     * Lists all AssetItemIncident models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetItemIncidentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionApproval()
    {
        $searchModel = new AssetItemIncidentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('approval', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AssetItemIncident model.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($c)
    {
        $id_assetitem_incident = EncryptionDB::encryptor('decrypt', $c);
        return $this->render('view', [
            'model' => $this->findModel($id_assetitem_incident),
        ]);
    }

    /**
     * Creates a new AssetItemIncident model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AssetItemIncident();
        if ($model->load(Yii::$app->request->post())) {
            $model->photo1 = UploadedFile::getInstance($model, 'photo1');
            if ($model->save(false)) {
                $model->upload();
                Yii::$app->session->setFlash('success', "Data pelaporan Asset Rusak Berhasil Dimasukan!");
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
//        if ($model->load(Yii::$app->request->post())) {
//            $model->photo1 = UploadedFile::getInstance($model, 'photo1');
//            $image_name = $model->photo1;
//            $image_path = '../web/images/asset_kejadian/' . $image_name;
//            $model->photo1->saveAs($image_path);
//            $model->save(false);
//            return $this->redirect(['index']);
//
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
    }

    /**
     * Updates an existing AssetItemIncident model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($c)
    {
        $id_assetitem_incident = EncryptionDB::encryptor('decrypt', $c);
        $model = $this->findModel($id_assetitem_incident);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AssetItemIncident model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($c)
    {
        $id_assetitem_incident = EncryptionDB::encryptor('decrypt', $c);
        $this->findModel($id_assetitem_incident)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AssetItemIncident model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssetItemIncident the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssetItemIncident::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUploadFoto($c)
    {
        $id = EncryptionDB::encryptor('decrypt', $c);
        $model = $this->findModel($id);
        $model->backupNameOldPicture(); //Dibackup dulu nama-nama file yang lama sblm diupload yang baru
        if ($model->load(Yii::$app->request->post())) {
            if ($model->uploadFoto()){
                if ($model->save()){
                    Yii::$app->session->setFlash('success', "Upload image success!");
                    return $this->redirect(['index']);
                }else{
                    Yii::$app->session->setFlash('danger', "Upload image Failed!");
                    return $this->render('upload-foto', [
                        'model' => $model,
                    ]);
                }
            }
        }

        return $this->render('upload-foto', [
            'model' => $model,
        ]);
    }

    public function actionResetImage($c)
    {
        $id = EncryptionDB::encryptor('decrypt', $c);
        $model = $this->findModel($id);
        $model->photo1 = ""; //Ini bagian untuk reset gambar
        $model->save(false);
        Yii::$app->session->setFlash('success', "Succesfully reset image to default!");
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['success' => true];
        }
        return $this->redirect(['index']);
    }
    public function actionApprovalView($u)
    {
        $id = EncryptionDB::staticEncryptor("decrypt",$u);
        return $this->render('approval-view', [
            'model' => $this->findModel($id),
        ]);
    }
}
