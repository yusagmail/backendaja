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
class VendorController extends Controller
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
	
    public function actionListAssesment()
    {
        $searchModel = new VendorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list-assesment', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
    /**
     * Fitur untuk generate username dari Vendor
     */	
    public function actionUserlist()
    {
        $searchModel = new VendorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('userlist', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Fitur untuk generate username dari Vendor
     */
    public function actionGenerateUser($is)
    {
        $model = new User();
		$model->user_level = 'member';
		
		#Get Vendor
		$id_vendor = EncryptionDB::encryptor('decrypt',$is);
		$Vendor = $this->findVendor($id_vendor);
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			//1. Step 1 - Simpan ke tabel user
            $model->setPassword($model->password);
            $model->generateAuthKey();
            $model->generatePasswordResetToken();
            $model->save();
			
			//2. Step 2 - Pasangankan rolenya di tabel auth_assignment
			$modelauth = new AuthAssignment;
			$modelauth->user_id = $model->id;
			$modelauth->item_name = "member";
			$modelauth->created_at =strtotime(Timeanddate::getCurrentDateTime());
			$modelauth->save(false);
			
			//3. Step 3 - Simpan user id di tabel Vendor
			$Vendor->id_user = $model->id;
			$Vendor->save(false);
			
			Yii::$app->session->setFlash('success', "Username untuk Vendor <b>".$Vendor->name."</b> telah berhasil dibuat dengan username <b>".$model->username."</b>!.");
			
            return $this->redirect(['userlist']);
        } else {
            return $this->render('generate-user', [
                'model' => $model,
				'Vendor' => $Vendor,
            ]);
        }
    }
	
	
    /**
     * Fitur untuk ganti password
     */
    public function actionChangePassword($is, $ui)
    {
		#Get Vendor
		$id_vendor = EncryptionDB::encryptor('decrypt',$is);
		$Vendor = $this->findVendor($id_vendor);
		
		#Get Vendor
		$id_user = EncryptionDB::encryptor('decrypt',$ui);
		$model = $this->findUser($id_user);
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->setPassword($model->password);
            $model->save(false);
		
			Yii::$app->session->setFlash('success', "Perubahan data untuk Vendor <b>".$Vendor->name."</b> telah berhasil dibuat!.");
			
            return $this->redirect(['userlist']);
        } else {
            return $this->render('change-password', [
                'model' => $model,
				'Vendor' => $Vendor,
            ]);
        }
    }

    /**
     * Displays a single Vendor model.
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

    /**
     * Creates a new Vendor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vendor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_vendor]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Vendor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_vendor]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vendor model.
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
