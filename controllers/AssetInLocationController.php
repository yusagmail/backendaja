<?php

namespace backend\controllers;

use Yii;
use backend\models\Location;
use backend\models\LocationUnit;
use backend\models\AssetItemLocation;
use backend\models\AssetReceived;
use backend\models\AssetItem_Generic;
use backend\models\AssetItem;
use backend\models\AssetItemSearch_Generic;
use backend\models\LocationSearch;
use backend\models\AppSettingSearch;
use backend\models\AppFieldConfigSearch;
use backend\models\AppFieldConfig;
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
use common\helpers\IPAddressFunction;
use common\helpers\Timeanddate;
/**
 * AssetItemController implements the CRUD actions for AssetItem model.
 */
class AssetInLocationController extends Controller
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
        $searchModel = new LocationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            $dataProvider->pagination->pageSize=10,
        ]);
    }

    public function actionList()
    {
        $searchModel = new LocationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            $dataProvider->pagination->pageSize=10,
			
        ]);
    }

    public function actionListSearch()
    {
        $searchModel = new LocationSearch();
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

	//$sam => Untuk targeted ID untuk element scroll into view
	public function actionViewDetail($c, $sam="")
    {
		$id_location_unit = EncryptionDB::staticEncryptor("decrypt",$c);
		$model = $this->findLocationUnit($id_location_unit);
        return $this->render('view_all_detail', [
            'model' => $model,
			'id_location_unit' =>$id_location_unit,
			'c' =>$c,
			'sam' =>$sam,
			'status_read_only'=>false,
			//'modelItemLocation' => $this->findModelItemLocation($model->id_asset_item_location),

        ]);
    }

   	public function actionViewOnlyDetail($c, $sam="")
    {
		$id_location_unit = EncryptionDB::staticEncryptor("decrypt",$c);
		$model = $this->findLocationUnit($id_location_unit);
        return $this->render('view_all_detail', [
            'model' => $model,
			'id_location_unit' =>$id_location_unit,
			'c' =>$c,
			'sam' =>$sam,
			'status_read_only'=>true,
			//'modelItemLocation' => $this->findModelItemLocation($model->id_asset_item_location),

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
        $model = new Location();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_item]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionAddItem($am, $iai, $ip, $vg, $c)
    {
		$iai = EncryptionDB::staticEncryptor("decrypt",$iai);
		$am = EncryptionDB::staticEncryptor("decrypt",$am);
		$ip = EncryptionDB::staticEncryptor("decrypt",$ip);
		$vg = EncryptionDB::staticEncryptor("decrypt",$vg);
		$id_location_unit = EncryptionDB::staticEncryptor("decrypt",$c);
		if($iai== ""){$iai=0;}
		
		/*
		echo "iai".$iai."<br>";
		echo $am."<Br>";
		echo $ip."<Br>";
		echo "Varian Group".$vg."<br>";
		*/
		
        //$model = new AssetItem_Generic();
		$varian_group = "id_asset_master#".$iai;
		$varian_group = $vg;
		$config['varian_group'] = $varian_group;
		$model = new AssetItem_Generic($config);
		
		$modelLocation = $this->findLocationUnit($id_location_unit);
		
		/*Tambahkan fitur untuk mengambil nama pemilik */
		if(isset($modelLocation->owner)){
			$namaPemilik = $modelLocation->owner->name;
			//Hard Code
			$label = "%Pemilik%";
			$fieldnamePemilik = AppFieldConfigSearch::getFieldByLabel(AssetItem::tableName(), $label, $varian_group);
			//echo $fieldnamePemilik;
			if($fieldnamePemilik != ""){
				$model->$fieldnamePemilik = $namaPemilik;
			}
		}

        if ($model->load(Yii::$app->request->post()) ) {
			$model->id_asset_master = $am;
			$model->id_asset_item_parent = $iai;
			$model->id_location_unit = $id_location_unit;
			if($model->save()){
				$sam = EncryptionDB::staticEncryptor("encrypt",$am);
				$ip = EncryptionDB::staticEncryptor("encrypt",$ip);
				Yii::$app->session->setFlash('success', TransactionLabel::msgSaveSucces("aset"));
				return $this->redirect(['view-detail', 'c' => $c, 'sam'=>$sam]);
			}else{
                //$iai = EncryptionDB::encryptor("encrypt",$iai);
                //$ip = EncryptionDB::staticEncryptor("encrypt",$ip);
                //Yii::$app->session->setFlash('danger', TransactionLabel::msgFaildSaveSucces("aset"));
                //return $this->redirect(['view-detail', 'ic' => $iai, 'c'=>$ip]);
            }

			//exit();
            //return $this->redirect(['view', 'id' => $model->id_asset_item]);
        }

        //return $this->renderAjax('add-item', [
		return $this->render('add-item-non-modal', [
            'model' => $model,
			'varian_group'=>$vg,
			'modelLocation'=>$modelLocation,
			'am'=>$am,
			/*
			'iai' => EncryptionDB::staticEncryptor("encrypt",$iai),
			'am' => EncryptionDB::staticEncryptor("encrypt",$am),
			'ip' => EncryptionDB::staticEncryptor("encrypt",$ip)
			*/
        ]);
    }
	
    public function actionUpdateItem($i, $am, $vg, $c)
    {
		$am = EncryptionDB::staticEncryptor("decrypt",$am);
		$id_location_unit = EncryptionDB::staticEncryptor("decrypt",$c);
		$id_asset_item = EncryptionDB::staticEncryptor("decrypt",$i);
        //$model = $this->findModelAssetItem($id_asset_item);
		$vg = EncryptionDB::staticEncryptor("decrypt",$vg);
		
		
        //$model = new AssetItem_Generic();
		$varian_group = $vg;
		$config['varian_group'] = $vg;
		//$model = new \backend\models\AssetItem_AssetMaster10($config);
		$model = AssetItem_Generic::getModelBasedOnVarGroup($am, $config);
		$model = $model->getOne($id_asset_item);
		
		$modelLocation = $this->findLocationUnit($id_location_unit);

        if ($model->load(Yii::$app->request->post()) ) {
			if($model->save()){
				$sam = EncryptionDB::staticEncryptor("encrypt",$am);
				//$ip = EncryptionDB::staticEncryptor("encrypt",$ip);
				Yii::$app->session->setFlash('success', TransactionLabel::msgSaveSucces("aset"));
				return $this->redirect(['view-detail', 'c' => $c, 'sam'=>$sam]);
			}
        }

        //return $this->renderAjax('add-item', [
		return $this->render('add-item-non-modal', [
            'model' => $model,
			'varian_group'=>$vg,
			'modelLocation'=>$modelLocation,
			'am'=>$am,
        ]);
    }
	
    public function actionViewItem($i, $am, $vg, $c)
    {
		$am = EncryptionDB::staticEncryptor("decrypt",$am);
		$id_location_unit = EncryptionDB::staticEncryptor("decrypt",$c);
		$id_asset_item = EncryptionDB::staticEncryptor("decrypt",$i);
        $model = $this->findModelAssetItem($id_asset_item);
		$vg = EncryptionDB::staticEncryptor("decrypt",$vg);
		
        //$model = new AssetItem_Generic();
		$varian_group = $vg;
		$config['varian_group'] = $vg;
		$model = new AssetItem_Generic($config);
		$model = AssetItem_Generic::findOne($id_asset_item);
		
		$modelLocation = $this->findLocationUnit($id_location_unit);

		return $this->render('view-item-non-modal', [
            'model' => $model,
			'varian_group'=>$vg,
			'modelLocation'=>$modelLocation,
			'am'=>$am,
        ]);
    }
	
    public function actionMapEdit($i, $am, $vg, $c)
    {
		$i_enc = $i;
		$am_enc = $am;
		$vg_enc = $vg;
		$c_enc = $c;
		$am = EncryptionDB::staticEncryptor("decrypt",$am);
		$id_location_unit = EncryptionDB::staticEncryptor("decrypt",$c);
		$id_asset_item = EncryptionDB::staticEncryptor("decrypt",$i);
        $model = $this->findModelAssetItem($id_asset_item);
		$vg = EncryptionDB::staticEncryptor("decrypt",$vg);
		
        //$model = new AssetItem_Generic();
		$varian_group = $vg;
		$config['varian_group'] = $vg;
		$model = new AssetItem_Generic($config);
		$model = AssetItem_Generic::findOne($id_asset_item);
		
		$modelLocation = $this->findLocationUnit($id_location_unit);
		
		//Simpan Path Sesuai dengan polgygon yang dipilih
		if(isset($_POST['savepath'])){
			$path = $_POST['path'];

			//Cara penyimpanannya masih hard code
			AssetItemSearch_Generic::setValueMapPathFromDynamicLabel($model, $vg, $path);
			/*
			switch($vg){
				case "id_asset_master#10":
					$model->label35 = $path;
					break;
				
				case "id_asset_master#11":
					$model->label26 = $path;
					break;
				case "id_asset_master#12":
					$model->label16 = $path;
					break;
			}
			
			$model->save(false);
			*/
			Yii::$app->session->setFlash('success', TransactionLabel::msgSaveSucces("aset"));
			return $this->redirect(['map-view', "i"=>$i_enc, "am"=>$am_enc, "vg"=>$vg_enc, "c"=>$c_enc]);
		}

		return $this->render('map-edit', [
            'model' => $model,
			'varian_group'=>$vg,
			'modelLocation'=>$modelLocation,
			'am'=>$am,
        ]);
    }
	
    public function actionMapView($i, $am, $vg, $c)
    {
		$am = EncryptionDB::staticEncryptor("decrypt",$am);
		$id_location_unit = EncryptionDB::staticEncryptor("decrypt",$c);
		$id_asset_item = EncryptionDB::staticEncryptor("decrypt",$i);
        $model = $this->findModelAssetItem($id_asset_item);
		$vg = EncryptionDB::staticEncryptor("decrypt",$vg);
		
        //$model = new AssetItem_Generic();
		$varian_group = $vg;
		$config['varian_group'] = $vg;
		$model = new AssetItem_Generic($config);
		$model = AssetItem_Generic::findOne($id_asset_item);
		
		$modelLocation = $this->findLocationUnit($id_location_unit);

		return $this->render('map-view', [
            'model' => $model,
			'varian_group'=>$vg,
			'modelLocation'=>$modelLocation,
			'am'=>$am,
        ]);
    }
	
	public function actionUploadFileAttach1($c)
    {
		$id_location_unit = EncryptionDB::staticEncryptor("decrypt",$c);
        $model = $this->findLocationUnit($id_location_unit);

        if ($model->load(Yii::$app->request->post())) {
			$model->attachfile1 = UploadedFile::getInstance($model, 'attachfile1');
            if ($model->uploadAttachFile1()) {
				Yii::$app->session->setFlash('success', TransactionLabel::msgUploadSuccess("bukti survey"));
				return $this->redirect(['view-detail', 'c' => $c]);
            }
            
        }

        return $this->render('bukti-survey/upload-file-attach1', [
            'model' => $model,
        ]);
    }
	
	
	public function actionChangeStatus1($c)
    {
		$id_location_unit = EncryptionDB::staticEncryptor("decrypt",$c);
        $model = $this->findLocationUnit($id_location_unit);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
				$model->status1_changed_user = Yii::$app->user->identity->id;
				$model->status1_changed_ip = IPAddressFunction::getUserIPAddress();
				$model->status1_changed_time = Timeanddate::getCurrentDateTime();
				
				$model->save(false);
				Yii::$app->session->setFlash('success', TransactionLabel::msgStatusSuccess("status"));
				return $this->redirect(['view-detail', 'c' => $c]);
            }
            
        }

        return $this->render('status1/change-status1', [
            'model' => $model,
        ]);
    }
	
   public function actionAddItemAjax($am, $iai, $ip, $vg)
    {
		$iai = EncryptionDB::staticEncryptor("decrypt",$iai);
		$am = EncryptionDB::staticEncryptor("decrypt",$am);
		$ip = EncryptionDB::staticEncryptor("decrypt",$ip);
		$vg = EncryptionDB::staticEncryptor("decrypt",$vg);
		if($iai== ""){$iai=0;}
		
		/*
		echo "iai".$iai."<br>";
		echo $am."<Br>";
		echo $ip."<Br>";
		echo "Varian Group".$vg."<br>";
		*/
		
        //$model = new AssetItem_Generic();
		$varian_group = "id_asset_master#".$iai;
		$varian_group = $vg;
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
                //$iai = EncryptionDB::encryptor("encrypt",$iai);
                //$ip = EncryptionDB::staticEncryptor("encrypt",$ip);
                //Yii::$app->session->setFlash('danger', TransactionLabel::msgFaildSaveSucces("aset"));
                //return $this->redirect(['view-detail', 'ic' => $iai, 'c'=>$ip]);
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

			//exit();
            //return $this->redirect(['view', 'id' => $model->id_asset_item]);
        }

        //return $this->renderAjax('add-item', [
		return $this->render('add-item', [
            'model' => $model,
			'varian_group'=>$vg,
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
		$modelGen = new Location($config);
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
		$modelGen = new Location($config);
		$model = $modelGen->findOne($id);
        return $this->renderAjax('view-ajax', [
            'model' => $model,
			'varian_group'=> $vg,
        ]);
    }

    public function actionAddItemBasic($vg)
    {
        $model = new Location();

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
        $model = new Location();
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
                return $this->redirect(['list-search?LocationSearch%5Bid_type_asset_item1%5D=&LocationSearch%5Bid_type_asset_item2%5D=&LocationSearch%5Bnumber1%5D=&LocationSearch%5Bid_kabupaten%5D=&LocationSearch%5Bid_kecamatan%5D=&LocationSearch%5Bid_kelurahan%5D=']);
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

    public function actionDeleteItem($i, $am, $c)
    {
		$id_asset_item = EncryptionDB::staticEncryptor("decrypt",$i);
        $model = $this->findModelAssetItem($id_asset_item);
        $delete = $model->delete();
		Yii::$app->session->setFlash('success', TransactionLabel::msgDeleteSucces("aset"));
        //return $this->redirect(['view-detail',  'c'=>$c, '#'=>'AM-'.$am]);
		 return $this->redirect(['view-detail',  'c'=>$c, 'sam'=>$am]);
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
    protected function findLocationUnit($id)
    {
        if (($model = LocationUnit::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	 
    protected function findModel($id)
    {
        if (($model = Location::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
    protected function findModelAssetItem($id)
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
