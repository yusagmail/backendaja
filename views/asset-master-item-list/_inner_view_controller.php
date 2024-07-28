<?php
use backend\models\AssetItem;
use backend\models\AssetItemSearch;
use common\helpers\LogHelper;
use yii\web\NotFoundHttpException;

\yii\web\YiiAsset::register($this);

/*
$this->title = "Detail Lembar Kerja";
$this->params['breadcrumbs'][] = ['label' => 'Lembar Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Lembar Kerja Detail', 'url' => ['detail', 'i'=>$i]];
*/
/*
    Petunjuk :
    Copykan fungsi dari controller utamanya
    1. Ganti $this->request menjadi Yii::$app->request
    2. Gantin return $this->render(..) jadi echo $this->render
    3. Jika ada $this->redirect diganti dengan Yii::$app->response->redirect
    */


/*
Controllernya diatur di view lagi karena dirender di view
*/
$type_distribution_asset = \backend\models\AppSettingSearch::getValueByKey("TYPE-DISTRIBUTION-ASSET", "indoor");
//echo $type_distribution_asset;
switch ($type_distribution_asset) {
    case "outdoor":
        switch ($action) {
            case "index":
                $searchModel = new \backend\models\AssetItemSearch();
                $searchModel->id_asset_master = $model->id_asset_master;
                $dataProvider = $searchModel->searchSimple(Yii::$app->request->queryParams);

                echo  $this->render('outdoor/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'action' => $action,
                    //'t' => $t,
                    'i' =>$i
                ]);


                break;

            case "view":
                $idi = \common\utils\EncryptionDB::encryptor('decrypt', $idi);
                $model = findAssetItem($idi);

                echo $this->render('outdoor/view-all', [
                    'model' => $model,
                    't' => $t,
                    'id' => $model->id_asset_master,
                    'idi' => $idi,
                    'i' => $i,
                ]);
                break;

            case "update":
                $idi = \common\utils\EncryptionDB::encryptor('decrypt', $idi);
                $moditem = findAssetItem($idi);
                $id_asset_master = \common\utils\EncryptionDB::encryptor("decrypt", $i);
                $modelmaster = findModelAssetMaster($id_asset_master);
                //Yii::$app->response->redirect(['asset-item-list/update-single/', 'i' => $i, 'idi' => $idi]);
                //break;
                

                $modelReceived = \backend\models\AssetReceived::find()
                    ->where(['id_asset_item' => $idi])
                    ->one();
                if($modelReceived == null){
                    $modelReceived = new \backend\models\AssetReceived();
                }

                $modelLocation = \backend\models\AssetItemMapping::find()
                    ->where(['id_asset_item' => $idi])
                    ->one();
                if($modelLocation == null){
                    $modelLocation = new \backend\models\AssetItemMapping();
                }



                    $postData = Yii::$app->request->post();
                    //$model->load($postData);
                    if ($moditem->load($postData)) {
                        $moditem->save(false);
                    }
                    if ($modelLocation->load($postData)) {
                        $modelLocation->id_asset_item = $moditem->id_asset_item;
                        $modelLocation->save(false);
                        //$model->id_asset_item_location = $modelLocation->id_asset_item_location_unit;

                        //Model Received
                        if ($modelReceived->load($postData)) {
                            $modelReceived->id_asset_master = $moditem->id_asset_master;
                            $modelReceived->id_asset_item = $moditem->id_asset_item;
                            $modelReceived->save(false);
                            //$moditem->id_asset_received = $modelReceived->id_asset_received;
                        }

                        Yii::$app->session->setFlash('success', "Update data berhasil!");
                        Yii::$app->response->redirect(['asset-master-item/view-stock/', 'i' => $i, 't' => $t, 'action' => 'index']);
                    }

                echo $this->render('outdoor/create_single', [
                    'model' => $moditem,
                    't' => $t,
                    'i' => $i,
                    'idi' => $idi,
                    'modelmaster' => $modelmaster,
                    'modelLocation' => $modelLocation,
                    'modelReceived' => $modelReceived,
                    'page_title' => 'Ubah Data Asset Item'
                ]);
                break;

            case "create_single":
                    $id_asset_master = \common\utils\EncryptionDB::encryptor("decrypt", $i);
                    $modelmaster = findModelAssetMaster($id_asset_master);
                    $model = new AssetItem();
                    $model->id_asset_master = $id_asset_master;
                    $model->number1 = "AUTO GENERATE";
                    $modelLocation = new \backend\models\AssetItemMapping();
                    $modelReceived = new \backend\models\AssetReceived();

                    $model->id_asset_item_location = 1;
                    $model->id_asset_received = 1;

                    $postData = Yii::$app->request->post();
                    //$model->load($postData);
                    if ($model->load($postData)) {
                        $model->save(false);
                    }
                    if ($modelLocation->load($postData)) {
                        $modelLocation->id_asset_item = $model->id_asset_item;
                        $modelLocation->save(false);
                        //$model->id_asset_item_location = $modelLocation->id_asset_item_location_unit;

                        //Model Received
                        if ($modelReceived->load($postData)) {
                            $modelReceived->id_asset_master = $model->id_asset_master;
                            $modelReceived->id_asset_item = $model->id_asset_item;
                            $modelReceived->save(false);
                            $model->id_asset_received = $modelReceived->id_asset_received;
                        }

                        if ($model->load($postData)) {
                            if($model->number1 == "AUTO GENERATE"){
                                $model->number1 = ""; //Harus dikosongkan dulu
                                $model->number1 = $model->generateAssetItemNumber();
                            }
                            $model->save(false);

                            Yii::$app->response->redirect(['asset-master-item/view-stock', 'i' => $i]);
                            //return $this->redirect(['view', 'id' => $model->id_asset_item]);
                        }
                    }

                    echo $this->render('outdoor/create_single', [
                        'model' => $model,
                        'modelLocation' => $modelLocation,
                        'modelReceived' => $modelReceived,
                        'modelmaster' => $modelmaster,
                        'page_title' => 'Tambah Asset Item'
                    ]);
                break;

            case "delete":
                $id_asset_item = \common\utils\EncryptionDB::encryptor('decrypt', $idi);

                //Delete yang lainnya juga
                $modelview = \backend\models\AssetReceived::find()
                    ->where(['id_asset_item' => $id_asset_item])
                    ->one();
                if($modelview != null){
                    $modelview->delete();
                }

                $modelview = \backend\models\AssetItemLocationUnit::find()
                    ->where(['id_asset_item' => $id_asset_item])
                    ->one();
                if($modelview != null){
                    $modelview->delete();
                }

                $AssetItem = AssetItem::findOne([
                    'id_asset_item' => $id_asset_item,
                ]);
                $AssetItem->delete();

                Yii::$app->session->setFlash('success', "Hapus data item berhasil!");
                Yii::$app->response->redirect(['asset-master-item/view-stock/', 'i' => $i, 't' => $t, 'action' => 'index']);
                break;
        }
    break;



    case "indoor":
        switch ($action) {
            case "index":
                $searchModel = new \backend\models\AssetItemSearch();
                $searchModel->id_asset_master = $model->id_asset_master;
                $dataProvider = $searchModel->searchSimple(Yii::$app->request->queryParams);

                echo  $this->render('indoor/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'action' => $action,
                    //'t' => $t,
                    'i' =>$i
                ]);


                break;

            case "view":
                $idi = \common\utils\EncryptionDB::encryptor('decrypt', $idi);
                $model = findAssetItem($idi);

                echo $this->render('indoor/view-all', [
                    'model' => $model,
                    't' => $t,
                    'id' => $model->id_asset_master,
                    'idi' => $idi,
                    'i' => $i,
                ]);
                break;

            case "update":
                $idi = \common\utils\EncryptionDB::encryptor('decrypt', $idi);
                $moditem = findAssetItem($idi);
                $id_asset_master = \common\utils\EncryptionDB::encryptor("decrypt", $i);
                $modelmaster = findModelAssetMaster($id_asset_master);
                //Yii::$app->response->redirect(['asset-item-list/update-single/', 'i' => $i, 'idi' => $idi]);
                //break;
                

                $modelReceived = \backend\models\AssetReceived::find()
                    ->where(['id_asset_item' => $idi])
                    ->one();
                if($modelReceived == null){
                    $modelReceived = new \backend\models\AssetReceived();
                }

                $modelLocation = \backend\models\AssetItemLocationUnit::find()
                    ->where(['id_asset_item' => $idi])
                    ->one();
                if($modelLocation == null){
                    $modelLocation = new \backend\models\AssetItemLocationUnit();
                }



                    $postData = Yii::$app->request->post();
                    //$model->load($postData);
                    if ($moditem->load($postData)) {
                        $moditem->save(false);
                    }
                    if ($modelLocation->load($postData)) {
                        $modelLocation->id_asset_item = $moditem->id_asset_item;
                        $modelLocation->save(false);
                        //$model->id_asset_item_location = $modelLocation->id_asset_item_location_unit;

                        //Model Received
                        if ($modelReceived->load($postData)) {
                            $modelReceived->id_asset_master = $moditem->id_asset_master;
                            $modelReceived->id_asset_item = $moditem->id_asset_item;
                            $modelReceived->save(false);
                            //$moditem->id_asset_received = $modelReceived->id_asset_received;
                        }

                        Yii::$app->session->setFlash('success', "Update data berhasil!");
                        Yii::$app->response->redirect(['asset-master-item/view-stock/', 'i' => $i, 't' => $t, 'action' => 'index']);
                    }

                echo $this->render('indoor/create_single', [
                    'model' => $moditem,
                    't' => $t,
                    'i' => $i,
                    'idi' => $idi,
                    'modelmaster' => $modelmaster,
                    'modelLocation' => $modelLocation,
                    'modelReceived' => $modelReceived,
                    'page_title' => 'Ubah Data Asset Item'
                ]);
                break;

            case "create_single":

                    $id_asset_master = \common\utils\EncryptionDB::encryptor("decrypt", $i);
                    $modelmaster = findModelAssetMaster($id_asset_master);
                    $model = new AssetItem();
                    $model->id_asset_master = $id_asset_master;
                    $model->number1 = "AUTO GENERATE";
                    $modelLocation = new \backend\models\AssetItemLocationUnit();
                    $modelReceived = new \backend\models\AssetReceived();

                    $model->id_asset_item_location = 1;
                    $model->id_asset_received = 1;

                    $postData = Yii::$app->request->post();
                    //$model->load($postData);
                    if ($model->load($postData)) {
                        $model->save(false);
                    }
                    if ($modelLocation->load($postData)) {
                        $modelLocation->id_asset_master = $model->id_asset_master;
                        $modelLocation->id_asset_item = $model->id_asset_item;
                        $modelLocation->save(false);
                        $model->id_asset_item_location = $modelLocation->id_asset_item_location_unit;

                        //Model Received
                        if ($modelReceived->load($postData)) {
                            $modelReceived->id_asset_master = $model->id_asset_master;
                            $modelReceived->id_asset_item = $model->id_asset_item;
                            $modelReceived->save(false);
                            $model->id_asset_received = $modelReceived->id_asset_received;
                        }

                        if ($model->load($postData)) {
                            if($model->number1 == "AUTO GENERATE"){
                                $model->number1 = ""; //Harus dikosongkan dulu
                                $model->number1 = $model->generateAssetItemNumber();
                            }
                            $model->save(false);

                            Yii::$app->response->redirect(['asset-master-item/view-stock', 'i' => $i]);
                            //return $this->redirect(['view', 'id' => $model->id_asset_item]);
                        }
                    }

                    echo $this->render('indoor/create_single', [
                        'model' => $model,
                        'modelLocation' => $modelLocation,
                        'modelReceived' => $modelReceived,
                        'modelmaster' => $modelmaster,
                        'page_title' => 'Tambah Asset Item'
                    ]);
                break;

            case "delete":
                $id_asset_item = \common\utils\EncryptionDB::encryptor('decrypt', $idi);

                //Delete yang lainnya juga
                $modelview = \backend\models\AssetReceived::find()
                    ->where(['id_asset_item' => $id_asset_item])
                    ->one();
                if($modelview != null){
                    $modelview->delete();
                }

                $modelview = \backend\models\AssetItemLocationUnit::find()
                    ->where(['id_asset_item' => $id_asset_item])
                    ->one();
                if($modelview != null){
                    $modelview->delete();
                }

                $AssetItem = AssetItem::findOne([
                    'id_asset_item' => $id_asset_item,
                ]);
                $AssetItem->delete();

                Yii::$app->session->setFlash('success', "Hapus data item berhasil!");
                Yii::$app->response->redirect(['asset-master-item/view-stock/', 'i' => $i, 't' => $t, 'action' => 'index']);
                break;
        }
    break;
}


function findAssetItem($id)
{
    if (($model = AssetItem::findOne($id)) !== null) {
        return $model;
    }

    throw new NotFoundHttpException('Data Asset Iitem tidak ditemukan!'.$id);
}

function findModelAssetMaster($id)
{
    if (($model = \backend\models\AssetMaster::findOne($id)) !== null) {
        return $model;
    }

    throw new NotFoundHttpException('Data AssetMaster tidak ditemukan!.'.$id);
}

function findModel($id)
{
    if (($model = AssetMaster::findOne($id)) !== null) {
        return $model;
    }

    throw new NotFoundHttpException('Data AssetMaster tidak ditemukan!.'.$id);
}
