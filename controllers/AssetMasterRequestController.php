<?php

namespace backend\controllers;

use common\utils\EncryptionDB;
use backend\models\AssetMasterRequest;
use backend\models\AssetMasterRequestSearch;
use dosamigos\editable\EditableAction;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AssetMasterRequestController implements the CRUD actions for AssetMasterRequest model.
 */
class AssetMasterRequestController extends Controller
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
    public function actions()
    {
        return [
            'editable' => [
                'class' => EditableAction::className(),
                'modelClass' => AssetMasterRequest::className(),
                'forceCreate' => false,
            ]
        ];
//         [
//            'editable' => [
//                'class' => \kartik\grid\EditableColumn::className() ,
//                'modelClass' => AssetMasterRequest::className() ,
//                'forceCreate'=> false,
//            ]
//
//        ];
    }

    /**
     * Lists all AssetMasterRequest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetMasterRequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionApproval()
    {
        $model = new AssetMasterRequest();
        $searchModel = new AssetMasterRequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('approval', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);


    }

    public function actionResume(){
        $searchModel = new AssetMasterRequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('resume', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AssetMasterRequest model.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($c)
    {
        $id_master_request= EncryptionDB::encryptor('decrypt', $c);
        return $this->render('view', [
            'model' => $this->findModel($id_master_request),
        ]);
    }

    /**
     * Creates a new AssetMasterRequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AssetMasterRequest();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_master_request)]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AssetMasterRequest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($c)
    {
        $id_master_request= EncryptionDB::encryptor('decrypt', $c);
        $model = $this->findModel($id_master_request);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'c' => EncryptionDB::encryptor('encrypt', $model->id_asset_master_request)]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionBatchUpdate()
    {
        $sourceModel = new AssetMasterRequest();
    $dataProvider = $sourceModel->search(Yii::$app->request->getQueryParams());
    $models = $dataProvider->getModels();
    if (Model::loadMultiple($models, Yii::$app->request->post()) && Model::validateMultiple($models)) {
        $count = 0;
        foreach ($models as $index => $model) {
            // populate and save records for each model
            if ($model->save()) {
                $count++;
            }
        }
        Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
        return $this->redirect(['index']); // redirect to your next desired page
    } else {
        return $this->render('update', [
            'model'=>$sourceModel,
            'dataProvider'=>$dataProvider
        ]);
    }
}
    public function actionUpdateDevice()
    {
        $id = Yii::$app->request->post('id_asset_master_request');
        $requested_by = Yii::$app->request->post('requested_by');
        $request_notes = Yii::$app->request->post('request_notes');
        $approved_status = Yii::$app->request->post('approved_status');
        $model = $this->findModel($id);
        if($model !=null){
            $model->requested_by = $requested_by;
            $model->request_notes	= $request_notes;
            $model->approved_status	= $approved_status;
            $model->save(false);
            return $this->redirect(['approval']);

        }else{
            return $this->redirect(['approval']);
        }
    }

    /**
     * Deletes an existing AssetMasterRequest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $c
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($c)
    {
        $id_master_request= EncryptionDB::encryptor('decrypt', $c);
        $this->findModel($id_master_request)->delete();

        return $this->redirect(['approval']);
    }

    /**
     * Finds the AssetMasterRequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssetMasterRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssetMasterRequest::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
