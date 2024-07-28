<?php

namespace backend\controllers;

use backend\models\AssetItemLocation;
use backend\models\AssetReceived;
use backend\models\Kabupaten;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use backend\models\Location;
use backend\models\LocationSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use common\utils\EncryptionDB;

/**
 * LocationController implements the CRUD actions for Location model.
 */
class LocationController extends Controller
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
     * Lists all Location models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LocationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionMapEdit($u)
    {
		$id = EncryptionDB::encryptor("decrypt",$u);
		$model = $this->findModel($id);
		
		if(isset($_POST['savepos'])){
			$model->longitude = $_POST['longitude'];
			$model->latitude = $_POST['latitude'];
			$model->save(false);
			Yii::$app->session->setFlash('success', "Posisi Location berhasil tersimpan!");
		}
		
        return $this->render('map-edit', [
            'model' => $model,
        ]);
    }

    public function actionMapView($u)
    {
        $id = EncryptionDB::encryptor("decrypt",$u);
        $model = $this->findModel($id);
        
        $searchModel = new LocationSearch();
        $dataProviderDisplay = $searchModel->search(Yii::$app->request->queryParams);
        $dataProviderDisplay->pagination = false;

        return $this->render('map-view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProviderDisplay' => $dataProviderDisplay,
        ]);
    }

    /**
     * Displays a single Location model.
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

    public function actionLists($id)
    {
        $branches = Kabupaten::find()
            ->where(['id_propinsi' => $id])
            ->all();

        if (isset($branches) && count($branches) > 0) {
            foreach ($branches as $branch) {
                echo "<option value='", $branch->id_kabupaten . "'>" . $branch->nama_kabupaten . "</option>";
            }
        } else {
            echo "<option> Data Tidak Ke Load </option>";
        }
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
            echo "<option> Data Tidak Ke Load </option>";
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
            echo "<option> Data Tidak Ke Load </option>";
        }
    }
    /**
     * Creates a new Location model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
//    {
////        $model = new Location();
////
////        if ($model->load(Yii::$app->request->post()) && $model->save()) {
////            return $this->redirect(['view', 'id' => $model->id_location]);
////        }
////
////        return $this->render('create', [
////            'model' => $model,
////        ]);
////    }
    {
        $model = new Location();
        $modelLocation = new AssetItemLocation();
        $modelReceived = new AssetReceived();
        $modelLocation->id_asset_master = $model->id_location;

        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_location]);
        }
        /*
        $postData = Yii::$app->request->post();
        $model->load($postData);
        if ($modelLocation->load($postData)) {
            $modelLocation->id_asset_master = $model->id_location;
            $modelLocation->save();
            $model->id_location = $modelLocation->id_asset_item_location;

            if ($modelReceived->load($postData)) {
                $modelReceived->id_asset_master = $model->id_location;
                $modelReceived->save();
                $model->id_asset_received = $modelReceived->id_asset_received;
            }

            if ($model->load($postData)) {
                $model->save();
                return $this->redirect(['view', 'id' => $model->id_location]);
            }
        }
		*/
        return $this->render('create', [
            'model' => $model,
            'modelLocation' => $modelLocation,
        ]);
    }

    /**
     * Updates an existing Location model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_location]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Location model.
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
     * Finds the Location model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Location the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Location::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
