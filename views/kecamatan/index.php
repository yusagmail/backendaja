<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Kabupaten;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KecamatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title =  CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Kecamatan');
$this->params['breadcrumbs'][] = $this->title;

$dataKabupaten = ['' => 'Pilih'] + ArrayHelper::map(Kabupaten::find()->all(), 'id_kabupaten', 'nama_kabupaten');
?>
<?php echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="kecamatan-index box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey('Kecamatan'), ['create'], ['class' => 'btn btn-success']) ?>
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

//            'id_kecamatan',
                [
                    'attribute' => 'kabupaten.nama_kabupaten',
                    'filter' => Html::activeDropDownList($searchModel, 'id_kabupaten', $dataKabupaten, ['class' => 'form-control']),
                ],
                'nama_kecamatan',

                [
                    'header' => 'Action',
                    'class' => 'yii\grid\ActionColumn'
                ],
            ],
        ]); ?>

    </div>
</div>
