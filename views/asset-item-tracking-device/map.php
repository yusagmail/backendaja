<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use backend\models\AppSettingSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemTrackingDeviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = AppVocabularySearch::getValueByKey('Tracking Aset');
$this->params['breadcrumbs'][] = $this->title;

$imgdefault = '@web/images/home.jpg';
$backimage = AppSettingSearch::getImageUrl("DEFAULT-MAP-TRACKING", $imgdefault);
?>
<div class="asset-item-tracking-device-index box box-danger">
    <div class="box-body">
        <img class="img-responsive" src="<?php echo Yii::$app->request->baseUrl . $backimage; ?>"/>

    </div>
</div>
