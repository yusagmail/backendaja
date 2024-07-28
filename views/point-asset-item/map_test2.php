<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beacons';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php /*
    <script src="js/jquery.enhsplitter.js"></script>
    <link href="css/jquery.enhsplitter.css" rel="stylesheet"/>
*/ ?>
              <div class="overflow-x: auto; width: 100%;">
                <?php
                $model = new \backend\models\Point();

                //if ($model->load(Yii::$app->request->post()) && $model->save()) {
                //    echo Yii::$app->response->redirect(['cview', 'id' => $model->id_point]);
                //}

    $request = \Yii::$app->getRequest();
    if ($request->isPost && $model->load($request->post())) {
        //\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //return ['success' => $model->save()];
    }
    //echo $this->renderAjax('create', [
    //    'model' => $model,
    //]);
                ?>
                <?= $this->render('create', [
                    'model' => $model,
                ]) ?>
                </div>
            


<?php /*
            <?php
            $searchModel = new \backend\models\PointSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            ?>
              <div class="box-body">
                <?= $this->render('index-panel', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]) ?>
                </div>
                */ ?>


