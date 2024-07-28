<?php

namespace backend\controllers;

use common\utils\EncryptionDB;
use backend\models\AssetItem;
use backend\models\AssetItemLocation;
use backend\models\AssetItemSearch;
use backend\models\AssetReceived;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use backend\models\Sensor;
use backend\models\AssetItem_Generic;
use backend\models\AssetItemSearch_Generic;
use kartik\mpdf\Pdf;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * AssetItemController implements the CRUD actions for AssetItem model.
 */
class ConditionalAssetItemController extends Controller
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
	
    public function actionListNumber()
    {
        $searchModel = new AssetItemSearch_Generic();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list-number', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'c' => 'xyz',
            $dataProvider->pagination->pageSize=10,
			
        ]);
    }
	
    public function actionResume()
    {
        $searchModel = new AssetItemSearch_Generic();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        return $this->render('resume', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
    public function actionCreate()
    {
		$model = new AssetItem_Generic();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_asset_item]);
        }

		/*
        if ($model->load(Yii::$app->request->post()) ) {
			//echo "masuk"; exit();
			if($model->save()){
				
			}else{

            }
        }
		*/

        return $this->render('create', [
            'model' => $model,
        ]);
    }
	
    public function actionUpdateCondition()
    {
        $searchModel = new AssetItemSearch_Generic();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('update-condition', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'c' => 'xyz',
            $dataProvider->pagination->pageSize=10,
			
        ]);
    }
	
    public function actionView($c)
    {
        $id = EncryptionDB::encryptor("decrypt", $c);

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = AssetItem::findOne($id)) !== null) {
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
    // protected function getModelSensor($id)
    // {
    //     if (($model = Sensor::findOne($id)) !== null) {
    //         return $model;
    //     }

    //     throw new NotFoundHttpException('The Model Sensore does not exist.');
    // }

    protected function saveImport($data, $model)
    {
        $rows = [];
        array_shift($data); // membuang header pada excel
        foreach ($data as $key => $value) {
            if ($value['A'] != null) {
                $rows[] = array_merge_recursive([null], array_values($value));
            }
        }
        if (!empty($rows)) {
            try {
                return \Yii::$app->db->createCommand()->batchInsert(AssetItem::tableName(), $model->attributes(), $rows)->execute();
            } catch (\yii\db\Exception $exception) {
                \Yii::warning('Kesalahan dalam eksekusi database.');
            }
        } else {
            return false;
        }
    }
}
