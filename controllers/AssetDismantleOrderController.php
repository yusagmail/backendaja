<?php

namespace backend\controllers;

use Yii;
use common\utils\EncryptionDB;
use backend\models\AssetDismantleOrderAps;
use backend\models\AssetDismantleOrderBulk;
use backend\models\AssetDismantleOrder;
use backend\models\AssetDismantleOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use kartik\mpdf\Pdf;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * AssetDismantleOrderController implements the CRUD actions for AssetDismantleOrder model.
 */
class AssetDismantleOrderController extends Controller
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
     * Lists all AssetDismantleOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetDismantleOrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AssetDismantleOrder model.
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
     * Creates a new AssetDismantleOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AssetDismantleOrder();

        $model->order_date = \common\helpers\Timeanddate::getCurrentDate();
        $model->type_order = 'UNINSTALLATION';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_dismantle_order]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AssetDismantleOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_dismantle_order]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUploadFile($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->file1 = UploadedFile::getInstance($model, 'file1');
            if ($model->save()) {
                $model->uploadManualFile();
                Yii::$app->session->setFlash('success', "Upload File success!");
                return $this->redirect(['index']);
            }
        }

        return $this->render('upload-file', [
            'model' => $model,
        ]);
    }

    public function actionDownloadFile($c, $i)
    {
        $id = EncryptionDB::encryptor("decrypt", $c);
        $model = $this->findModel($id);

        $field = "file" . $i;
        if (isset($model->$field)) {
            if ($model->$field != "") {
                //Gunakan File dari yang sudah diupdate
                $path = Yii::getAlias('@webroot') . '/images/asset_file/' . $model->$field;
                if (file_exists($path)) {
                    return Yii::$app->response->sendFile($path);
                    exit;
                } else {
                    throw new NotFoundHttpException("can't find {$model->$field} file");
                }
            } else {
                throw new NotFoundHttpException("File belum pernah diupload");
            }
        } else {
            throw new NotFoundHttpException("Wrong File Numbering");
        }

    }

    public function actionGenPdf($c)
    {
        $id = EncryptionDB::encryptor("decrypt", $c);
        $pdf_content = $this->renderPartial('view-pdf', [
            $model = $this->findModel($id),
            'model' => $this->findModel($model->id_asset_dismantle_order),
        ]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_A4,
            'filename' => 'Laporan Dismantling Order' . date('d-m-Y_his') . '.pdf',
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $pdf_content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            'options' => [
                'title' => 'Data Dismantling Order',
            ],
            'methods' => [
                'SetTitle' => 'Data Dismantling Order',
                'SetHeader' => ['Data Dismantling Order||Date: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
                'SetAuthor' => 'Asset Management',
                'SetCreator' => 'Manager Service',
            ]

        ]);
                // http response
                $response = Yii::$app->response;
                $response->format = \yii\web\Response::FORMAT_RAW;
                $headers = Yii::$app->response->headers;
                $headers->add('Content-Type', 'application/pdf');
                return $pdf->render();
        
    }



    /**
     * Deletes an existing AssetDismantleOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

    /**
     * Finds the AssetDismantleOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssetDismantleOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssetDismantleOrder::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionResetImageIndex($c)
    {
        $id_asset_item = EncryptionDB::encryptor('decrypt',$c);
        $model = $this->findModel($id_asset_dismantling_order);
        $model->picture1 = ""; //Ini bagian untuk reset gambar
        $model->save(false);
        Yii::$app->session->setFlash('success', "Succesfully reset image to default!");
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['success' => true];
        }
        return $this->redirect(['index']);
    }

    public function actionResetImage($c)
    {
        $id_asset_item = EncryptionDB::encryptor('decrypt',$c);
        $model = $this->findModel($id_asset_dismantling_order);
        $model->picture1 = ""; //Ini bagian untuk reset gambar
        $model->save(false);
        Yii::$app->session->setFlash('success', "Succesfully reset image to default!");
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['success' => true];
        }
        return $this->redirect(['list-search?AssetItemSearch%5Bid_type_asset_item1%5D=&AssetItemSearch%5Bid_type_asset_item2%5D=&AssetItemSearch%5Bnumber1%5D=&AssetItemSearch%5Bid_kabupaten%5D=&AssetItemSearch%5Bid_kecamatan%5D=&AssetItemSearch%5Bid_kelurahan%5D=']);
    }

    public function actionUploadFileSearch($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->file1 = UploadedFile::getInstance($model, 'file1');
            if ($model->save()) {
                $model->uploadManualFile();
                Yii::$app->session->setFlash('success', "Upload File success!");
                return $this->redirect(['list-search?AssetDismantleOrderSearch%5Bid_asset_dismantling_order%5D=&AssetDismantleOrderSearch%5Bid_customer%5D=&AssetItemSearch%5Bnumber1%5D=&AssetItemSearch%5Bid_kabupaten%5D=&AssetItemSearch%5Bid_kecamatan%5D=&AssetItemSearch%5Bid_kelurahan%5D=']);
            }
        }

        return $this->render('upload-file', [
            'model' => $model,
        ]);
    }

    public function actionImportFile()
    {
        $model = new AssetDismantleOrder();
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'files');
            try {
                $inputFileType = IOFactory::identify($file->tempName);
                $reader = IOFactory::createReader($inputFileType);
                $spreadsheet = $reader->load($file->tempName);
            } catch (Exception $e) {
                die('Error loading file: ' . $e->getMessage());
            }
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            if ($this->saveImport($sheetData, $model)) {
                Yii::$app->getSession()->setFlash('success', 'Success');
                $this->redirect(['index']);
            } else {
                Yii::$app->getSession()->setFlash('error', 'Error');
                $this->redirect(['index']);
            }
        }
        return $this->renderAjax('import-file', [
            'model' => $model,
        ]);
    }

}
