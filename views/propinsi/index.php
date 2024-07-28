<?php

use yii\grid\GridView;
use yii\helpers\Html;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PropinsiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Provinsi');
$this->params['breadcrumbs'][] = $this->title;
?>
 <?php echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="propinsi-index box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
   

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey('Provinsi'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="box-body table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                [
                    'header' => 'No',
                    'class' => 'yii\grid\SerialColumn'
                ],

//            'id_propinsi',
                'nama_propinsi',

                [
                    'header' => 'Action',
                    'class' => 'yii\grid\ActionColumn'
                ],
            ],
        ]); ?>

    </div>
</div>
