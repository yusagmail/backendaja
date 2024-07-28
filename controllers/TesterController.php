<?php

namespace backend\controllers;

use backend\models\User;
use Yii;
use backend\models\Vendor;
use backend\models\VendorSearch;
use backend\models\AuthAssignment;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\utils\EncryptionDB;
use common\helpers\Timeanddate;

/**
 * VendorController implements the CRUD actions for Vendor model.
 */
class TesterController extends Controller
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
     * Lists all Vendor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VendorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
    /**
     * Displays a single Vendor model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionTestModal()
    {
        return $this->render('test-modal', [
            //'model' => $this->findModel($id),
        ]);
    }
	
    public function actionFormModal($u)
    {
        return $this->renderAjax('form-modal', [
            //'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Vendor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Vendor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vendor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	protected function findVendor($id)
    {
		
        if (($model = Vendor::findOne($id)) !== null) {
			
            return $model;
        }
		
		$message = "Vendor tidak diketemukan (".$id.")";
		 throw new NotFoundHttpException($message);
		//return $this->render('/site/error_internal', ['message' => $message, 'name'=>"Warning"]);
    }
	
	protected function findUser($id)
    {
		
        if (($model = User::findOne($id)) !== null) {
			
            return $model;
        }
		
		$message = "User tidak diketemukan (".$id.")";
		 throw new NotFoundHttpException($message);
		//return $this->render('/site/error_internal', ['message' => $message, 'name'=>"Warning"]);
    }
}
