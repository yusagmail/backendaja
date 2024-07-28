<?php

namespace backend\controllers;

use Yii;
use backend\models\AssetItem_Generic;
use backend\models\AssetItemLocation;
use backend\models\AssetReceived;
use backend\models\AssetItemSearch_Generic;
use backend\models\AppSettingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;
use kartik\mpdf\Pdf;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use yii\web\UploadedFile;
use common\utils\EncryptionDB;
use common\labeling\TransactionLabel;

/**
 * AssetItemController implements the CRUD actions for AssetItem model.
 */
class AssetInAssetController extends Controller
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
     * Lists all AssetItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetItemSearch_Generic();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            $dataProvider->pagination->pageSize=10,
        ]);
    }

    public function actionList()
    {
		$c = AppSettingSearch::getValueByKey("ID-MAIN-ASSET", "LzloRzRtWjh0S3d3ZitTMko0UENYQT09");
		$id = EncryptionDB::staticEncryptor("decrypt",$c);
		//echo $id; exit();
		//echo EncryptionDB::staticEncryptor("encrypt",1); exit();
        $searchModel = new AssetItemSearch_Generic();
		$searchModel->id_asset_master = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            $dataProvider->pagination->pageSize=10,
			'c'=>$c,
        ]);
    }

    public function actionListSearch()
    {
        $searchModel = new AssetItemSearch_Generic();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		$dataProviderDisplay = $searchModel->search(Yii::$app->request->queryParams);
		$dataProviderDisplay->pagination = false;

        return $this->render('list-search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'dataProviderDisplay' => $dataProviderDisplay,
            $dataProvider->pagination->pageSize=10,
        ]);
    }

    /**
     * Displays a single AssetItem model.
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

	public function actionViewDetail($ic, $c)
    {
		$id_asset_item = EncryptionDB::encryptor("decrypt",$ic);
		$idparent = EncryptionDB::staticEncryptor("decrypt",$c);
		//echo $id_asset_item;
		//echo $id_asset_item." ".$idparent;
		$model = $this->findModel($id_asset_item);
        return $this->render('view_all_detail', [
            'model' => $model,
			'modelItemLocation' => $this->findModelItemLocation($model->id_asset_item_location),
			'id_asset_item'=>$id_asset_item,
			'idparent'=>$idparent,
        ]);
    }

    public function actionKecamatan($id)
    {
        $branches = Kecamatan::find()
            ->where(['id_kabupaten' => $id])
            ->all();

        if (isset($branches) && count($branches) > 0) {
            foreach ($branches as $branch) {
                echo "<option value='", $branch->id_kecamatan . "'>" . $branch->nama_kecamatan . "</option>";
            }
        } else {
            echo "<option> Data yang dipilih tidak tersedia</option>";
        }
    }

    public function actionKelurahan($id)
    {
        $branches = Kelurahan::find()
            ->where(['id_kecamatan' => $id])
            ->all();

        if (isset($branches) && count($branches) > 0) {
            foreach ($branches as $branch) {
                echo "<option value='", $branch->id_kelurahan . "'>" . $branch->nama_kelurahan . "</option>";
            }
        } else {
            echo "<option> Data yang dipilih tidak tersedia</option>";
        }
    }

    public function actionCreate()
    {
        $model = new AssetItem_Generic();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_item]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionAddItem($am, $iai, $ip, $vg)
    {
		$iai = EncryptionDB::staticEncryptor("decrypt",$iai);
		$am = EncryptionDB::staticEncryptor("decrypt",$am);
		$ip = EncryptionDB::staticEncryptor("decrypt",$ip);

		//echo $iai." ".$am." ".$ip;
        //$model = new AssetItem_Generic();
		$varian_group = "id_asset_master#".$iai;
		$config['varian_group'] = $varian_group;
		$model = new AssetItem_Generic($config);

        if ($model->load(Yii::$app->request->post()) ) {
			$model->id_asset_master = $am;
			$model->id_asset_item_parent = $iai;
			if($model->save()){
				$iai = EncryptionDB::encryptor("encrypt",$iai);
				$ip = EncryptionDB::staticEncryptor("encrypt",$ip);
				Yii::$app->session->setFlash('success', TransactionLabel::msgSaveSucces("aset"));
				return $this->redirect(['view-detail', 'ic' => $iai, 'c'=>$ip]);
			}else{
                $iai = EncryptionDB::encryptor("encrypt",$iai);
                $ip = EncryptionDB::staticEncryptor("encrypt",$ip);
                Yii::$app->session->setFlash('danger', TransactionLabel::msgFaildSaveSucces("aset"));
                return $this->redirect(['view-detail', 'ic' => $iai, 'c'=>$ip]);
            }
//			else{
//				echo $iai."<br>";
//				echo $am."<Br>";
//				$errors = $model->errors;
//				var_export( $errors);
//				return $this->renderAjax('view-detail', [
//					'model' => $model,
//					'varian_group'=>EncryptionDB::staticEncryptor("decrypt",$vg),
//				]);
//			}

			exit();
            //return $this->redirect(['view', 'id' => $model->id_asset_item]);
        }

        return $this->renderAjax('add-item', [
            'model' => $model,
			'varian_group'=>EncryptionDB::staticEncryptor("decrypt",$vg),
			/*
			'iai' => EncryptionDB::staticEncryptor("encrypt",$iai),
			'am' => EncryptionDB::staticEncryptor("encrypt",$am),
			'ip' => EncryptionDB::staticEncryptor("encrypt",$ip)
			*/
        ]);
    }

    public function actionUpdateAjax($id, $am, $iai, $ip, $vg)
    {
		$iai = EncryptionDB::staticEncryptor("decrypt",$iai);
		$varian_group = "id_asset_master#".$iai;

		$config['varian_group'] = $varian_group;
		$modelGen = new AssetItem_Generic($config);
		$model = $modelGen->findOne($id);
        //$model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $iai = EncryptionDB::encryptor("encrypt",$iai);
			Yii::$app->session->setFlash('success', TransactionLabel::msgUpdateSucces("aset"));
			return $this->redirect(['view-detail', 'ic' => $iai, 'c'=>$ip]);
        }

        return $this->renderAjax('add-item', [
            'model' => $model,
			'varian_group'=> EncryptionDB::staticEncryptor("decrypt",$vg),
        ]);
    }

    public function actionViewAjax($id, $am, $iai, $ip, $vg)
    {
		$iai = EncryptionDB::staticEncryptor("decrypt",$iai);
		$varian_group = "id_asset_master#".$iai;

		$config['varian_group'] = $varian_group;
		$modelGen = new AssetItem_Generic($config);
		$model = $modelGen->findOne($id);
        return $this->renderAjax('view-ajax', [
            'model' => $model,
			'varian_group'=> $vg,
        ]);
    }

    public function actionAddItemBasic($vg)
    {
        $model = new AssetItem_Generic();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_item]);
        }

        return $this->render('add-item', [
            'model' => $model,
			'varian_group'=>EncryptionDB::staticEncryptor("decrypt",$vg),
        ]);
    }



    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_item]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new AssetItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateOld()
    {
        $model = new AssetItem_Generic();
		$modelLocation = new AssetItemLocation();
		$modelReceived = new AssetReceived();
		$modelLocation->id_asset_master = $model->id_asset_master;
		$model->id_asset_item_location = 1;
		$model->id_asset_received = 1;
		/*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_item]);
        }
		*/
		$postData = Yii::$app->request->post();
		$model->load($postData);
		if ($modelLocation->load($postData) ) {
			$modelLocation->id_asset_master = $model->id_asset_master;
            $modelLocation->save();
			$model->id_asset_item_location = $modelLocation->id_asset_item_location;

			if ($modelReceived->load($postData) ) {
				$modelReceived->id_asset_master = $model->id_asset_master;
				$modelReceived->save();
				$model->id_asset_received = $modelReceived->id_asset_received;
			}

			if ($model->load($postData)){
				$model->save();
				return $this->redirect(['view', 'id' => $model->id_asset_item]);
			}
        }

		/*
		if ($model->load($postData) && $modelLocation->load($postData) && Model::validateMultiple([$model, $modelLocation])) {
			//$model->save();
			//$modelLocation->save();

		}
		*/

        return $this->render('create_all', [
            'model' => $model,
			'modelLocation' => $modelLocation,
			'modelReceived' => $modelReceived,
        ]);
    }

    /**
     * Updates an existing AssetItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateOld($id)
    {
		$c = EncryptionDB::encryptor("encrypt",$id);
		return $this->redirect(['update-asset', 'c' => $c]);
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_item]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

	public function actionUpdateAsset($c)
    {
		$id = EncryptionDB::encryptor("decrypt",$c);
        $model = $this->findModel($id);
		$modelLocation = $this->findModelItemLocation($model->id_asset_item_location);
		$modelReceived = $this->findModelAssetReceived($model->id_asset_received);

		$postData = Yii::$app->request->post();
		$model->load($postData);
		if ($modelLocation->load($postData) ) {
			$modelLocation->id_asset_master = $model->id_asset_master;
            $modelLocation->save();
			$model->id_asset_item_location = $modelLocation->id_asset_item_location;

			if ($modelReceived->load($postData) ) {
				$modelReceived->id_asset_master = $model->id_asset_master;
				$modelReceived->save();
				$model->id_asset_received = $modelReceived->id_asset_received;
			}

			if ($model->load($postData)){
				$model->save();
				return $this->redirect(['view', 'id' => $model->id_asset_item]);
			}
        }

        return $this->render('update_all', [
            'model' => $model,
			'modelLocation' => $modelLocation,
			'modelReceived' => $modelReceived,
        ]);
    }

    public function actionUploadImage($id)
    {
        $model = $this->findModel($id);

		$model->backupNameOldPicture(); //Dibackup dulu nama-nama file yang lama sblm diupload yang baru
        if ($model->load(Yii::$app->request->post())) {
            $model->picture1 = UploadedFile::getInstance($model, 'picture1');
            if ($model->save(false)) {
                $model->upload();
                Yii::$app->session->setFlash('success', "Upload image success!");
                return $this->redirect(['index']);
            }
        }

        return $this->render('upload-image', [
            'model' => $model,
        ]);
    }
    public function actionUploadFile1($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->file1 = UploadedFile::getInstance($model, 'file1');
            if ($model->save(false)) {
                $model->uploadFile();
                Yii::$app->session->setFlash('success', "Upload File success!");
                return $this->redirect(['index']);
            }
        }

        return $this->render('upload-file', [
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

	public function actionDownloadFile($c,$i){
        $id = EncryptionDB::encryptor("decrypt",$c);
		$model = $this->findModel($id);

		$field = "file".$i;
		if(isset($model->$field)){
			if($model->$field != ""){
				//Gunakan File dari yang sudah diupdate
				$path = Yii::getAlias('@webroot').'/images/asset_file/'.$model->$field;
				if (file_exists($path)) {
					return Yii::$app->response->sendFile($path);
					exit;
				}else {
					throw new NotFoundHttpException("can't find {$model->$field} file");
				}
			}else{
				throw new NotFoundHttpException("File belum pernah diupload");
			}
		}else{
			throw new NotFoundHttpException("Wrong File Numbering");
		}

    }

    public function actionGenPdf($id)
    {
        $pdf_content  = $this->renderPartial('view-pdf', [
            $model = $this->findModel($id),
            'model' => $model,
            'modelItemLocation' => $this->findModelItemLocation($model->id_asset_item_location),
        ]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $pdf_content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            'options' => [
                'title' => 'Data Informasi Assets',
            ],
            'methods' => [
                'SetTitle' => 'Data Informasi Assets',
                'SetHeader' => ['Data Informasi Assets||Date: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
                'SetAuthor' => 'Asset Management',
                'SetCreator' => 'Admin',
            ]

        ]);
        // http response
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');
        return $pdf->render();

        /*$mpdf = new mPDF;
        $mpdf->WriteHTML($pdf_content);
        $mpdf->Output('Data Informasi Assets.pdf', 'D');
        exit;*/


        /*$model = $this->findModel($id);
        return $this->render('view-pdf', [
           'model' => $model,
           'modelItemLocation' => $this->findModelItemLocation($model->id_asset_item_location),
       ]);*/

    }

    public function actionUploadFileSearch($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->file1 = UploadedFile::getInstance($model, 'file1');
            if ($model->save()) {
                $model->uploadManualFile();
                Yii::$app->session->setFlash('success', "Upload File success!");
                return $this->redirect(['list-search?AssetItemSearch_Generic%5Bid_type_asset_item1%5D=&AssetItemSearch_Generic%5Bid_type_asset_item2%5D=&AssetItemSearch_Generic%5Bnumber1%5D=&AssetItemSearch_Generic%5Bid_kabupaten%5D=&AssetItemSearch_Generic%5Bid_kecamatan%5D=&AssetItemSearch_Generic%5Bid_kelurahan%5D=']);
            }
        }

        return $this->render('upload-file', [
            'model' => $model,
        ]);
    }



    /**
     * Deletes an existing AssetItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $delete = $model->delete();



        return $this->redirect(['index']);
    }

    public function actionDeleteAjax($id, $am, $iai, $ip, $vg)
    {
        $model = $this->findModel($id);
        $delete = $model->delete();

		$iai = EncryptionDB::staticEncryptor("decrypt",$iai);
        $iai = EncryptionDB::encryptor("encrypt",$iai);

        return $this->redirect(['view-detail', 'ic' => $iai, 'c'=>$ip]);
    }

    /**
     * Finds the AssetItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssetItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssetItem_Generic::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelItemLocation($id)
    {
        if (($model = AssetItemLocation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The Model Item Location does not exist.');
    }

    protected function findModelAssetReceived($id)
    {
        if (($model = AssetReceived::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The Model Asset Received does not exist.');
    }


    protected function getModelItemLocation($id)
    {
        if (($model = AssetItemLocation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The Model Item Location does not exist.');
    }

    protected function getModelAssetReceived($id)
    {
        if (($model = AssetReceived::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The Model Asset Received does not exist.');
    }
}
