<?php

namespace backend\controllers;

use Yii;
use backend\models\IntFilePlr;
use backend\models\IntFilePlrSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IntFilePlrController implements the CRUD actions for IntFilePlr model.
 */
class IntFilePlrController extends Controller
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
     * Lists all IntFilePlr models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IntFilePlrSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IntFilePlr model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionGenerateData($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $model = $this->findModel($id);
        $uploadedFile = \yii\web\UploadedFile::getInstance($model,'file');
        /*
        $extension =$uploadedFile->extension;
        if($extension=='xlsx'){
        $inputFileType = 'Xlsx';
        }else{
        $inputFileType = 'Xls';
        }
        $sheetname =$model->sheetname;
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        */

        //https://rubahmania.wordpress.com/2019/09/05/yii2-import-excel-dengan-phpspreadsheet/
        //https://phpspreadsheet.readthedocs.io/en/latest/

        $inputFileType = 'Xlsx';
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $sheetname = 'Sheet1';
         
        $reader->setLoadSheetsOnly($sheetname);
         
        $spreadsheet = $reader->load('file/integrasi/plr/'.$model->nama_file);
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        //echo $highestRow;
        $highestColumn = $worksheet->getHighestColumn();
        //echo $highestColumn;
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
         
        //inilah looping untuk membaca cell dalam file excel,perkolom
         
        for ($row = 2; $row <= $highestRow; ++$row) { //$row = 2 artinya baris kedua yang dibaca dulu(header kolom diskip disesuaikan saja)
            for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                $cell = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                echo $cell." | ";
            }
            $kolom3 = $worksheet->getCellByColumnAndRow(3, $row)->getValue(); //3 artinya kolom ke3
            $kolom10 = $worksheet->getCellByColumnAndRow(10, $row)->getValue(); // 10 artinya kolom 10
            //echo $kolom3.'<Br>';
            echo '<br>';
        }
             
        //naa disini baru isi dengan model ->save()
        exit();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new IntFilePlr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IntFilePlr();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->nama_file = \yii\web\UploadedFile::getInstance($model, 'nama_file');
            $model = \common\helpers\LogHelper::setCreatedLog($model);
            if($model->save()){
                if ($model->uploadFile()) {
                    Yii::$app->session->setFlash('success', "File berhasil diupload!");
                }
                return $this->redirect(['view', 'id' => $model->id_int_file_plr]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing IntFilePlr model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_int_file_plr]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing IntFilePlr model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IntFilePlr model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return IntFilePlr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IntFilePlr::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
