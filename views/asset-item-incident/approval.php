<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use common\utils\EncryptionDB;
use backend\models\AssetItemIncident;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemIncidentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = CommonActionLabelEnum::LIST_ALL . " " . AppVocabularySearch::getValueByKey(' Approval Pelaporan Kerusakan Asset');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-item-index box box-primary">
	<?php echo $this->render('/common/asset_item/_basic_search_without_master', ['model' => $searchModel]); ?>
	
    <div class="box-body table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => true,
        'pjax' => true,
        'striped' => true,
        'hover' => true,
        'responsiveWrap' => false,
        'panel' => ['type' => 'primary', 'heading' => 'Approval Pelaporan Asset'],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_asset_item_incident',
			'assetItem.assetMaster.asset_name',
            'assetItem.number1',
            //'assetMaster.asset_name',
            'incident_date',
//            'incident_datetime',
            'incident_notes:ntext',
            //'reported_by',
            //'reported_user_id',
            //'reported_ip_address',
            //'photo1',
            //'photo2',
            //'photo3',
            //'photo4',
            //'photo5',

            [
                'header'=>AppVocabularySearch::getValueByKey('Action'),
                'class'=> 'yii\grid\ActionColumn',
                'template' => '{view}{edit}',
                'buttons'=>[
                    'view' => function ($url, $model) {
                        $label = AppVocabularySearch::getValueByKey('View');
                        $u = EncryptionDB::staticEncryptor('encrypt', $model->id_asset_item_incident);
                        $url = Url::toRoute(['approval-view', 'u' => $u]);
                        return Html::a('<span class="btn btn-sm btn-warning">'.$label.'</span>', $url, [
                            'title' => Yii::t('yii', $label),]);
                    },

                    'edit' => function ($url, $model) {
                        $label = AppVocabularySearch::getValueByKey('Approval');
                        $u = EncryptionDB::staticEncryptor('encrypt', $model->id_asset_item_incident);
                        $url = Url::toRoute(['approval']);
                        return Html::a('<span class="btn btn-sm btn-success" style="margin-left: 1px">'.$label.'</span>', $url, [
                            'title' => Yii::t('yii', $label),]);
                    }
                ]
            ],

        ],

    ]); ?>
	</div>
</div>
