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

switch ($action) {
    case "index":
        $searchModel = new \backend\models\AssetItemSearch();
        $searchModel->id_asset_master = $model->id_asset_master;
        $dataProvider = $searchModel->searchSimple(Yii::$app->request->queryParams);

        echo  $this->render('index', [
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

        echo $this->render('view-all', [
            'model' => $model,
            't' => $t,
            'id' => $model->id_asset_master,
            'idi' => $idi,
            'i' => $i,
        ]);
        break;

    case "update":
        //$idi = \common\utils\EncryptionDB::encryptor('decrypt', $idi);
        //$moditem = findAssetItem($idi);
        Yii::$app->response->redirect(['asset-item-list/update-single/', 'i' => $i, 'idi' => $idi]);
        break;

        if (Yii::$app->request->isPost && $moditem->load(Yii::$app->request->post())) {

            if ($moditem->save()) {
                Yii::$app->session->setFlash('success', "Update data berhasil!");
                Yii::$app->response->redirect(['asset-master-complete/view-stock/', 'i' => $i, 't' => $t, 'action' => 'index']);
            }
        }

        echo $this->render('update_single', [
            'model' => $moditem,
            't' => $t,
            'i' => $i,
            'idi' => $idi,
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
        Yii::$app->response->redirect(['asset-master-complete/view-stock/', 'i' => $i, 't' => $t, 'action' => 'index']);
        break;
}


function findAssetItem($id)
{
    if (($model = AssetItem::findOne($id)) !== null) {
        return $model;
    }

    throw new NotFoundHttpException('Data Asset Iitem tidak ditemukan!'.$id);
}

function findModel($id)
{
    if (($model = AssetMaster::findOne($id)) !== null) {
        return $model;
    }

    throw new NotFoundHttpException('Data AssetMaster tidak ditemukan!.'.$id);
}
