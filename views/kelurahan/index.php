<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use backend\models\AppFieldConfigSearch;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KelurahanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Kelurahan');
$this->params['breadcrumbs'][] = $this->title;

$dataKecamtan = ['' => 'Pilih'] + ArrayHelper::map(Kecamatan::find()->all(), 'id_kecamatan', 'nama_kecamatan');
?>
<?php echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="kelurahan-index box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey('Kelurahan'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="box-body table-responsive">
        <?php
        $listColumnDynamic = AppFieldConfigSearch::getListGridView(Kelurahan::tableName());

        $colKecamatan = [
            'attribute' => 'kecamatan.nama_kecamatan',
            //'filter' => Html::activeDropDownList($searchModel, 'id_kecamatan', $dataKecamtan, ['class' => 'form-control']),
        ];
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_kecamatan', $colKecamatan);


        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $listColumnDynamic
        ]); ?>

    </div>
</div>
