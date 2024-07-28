<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\LogActivity */

$this->title = CommonActionLabelEnum::DETAIL.' '. AppVocabularySearch::getValueByKey('Log Activity');
$this->params['breadcrumbs'][] = ['label' => 'Log Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="log-activity-view box box-primary">

    
	<div class="box-header with-border">
        <p>
            <?= Html::a('<< '.CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(CommonActionLabelEnum::DELETE, ['delete', 'id' => $model->id_log_activity], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => CommonActionLabelEnum::CONFIRM_DELETE,
                    'method' => 'post',
                ],
            ]) ?>
        </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_log_activity',
            //'log_date',
            'log_datetime',
            'tablename',
            'related_id',
            [
                'label' => 'Activity',
                'attribute' => 'mstActivity.activity',
            ],
            [
                'label' => 'User Updated',
                'attribute' => 'user.full_name',
            ],
            'ip_address_user',
            //'additional_info1:ntext',
            //'additional_info2:ntext',
            //'additional_info3:ntext',
        ],
    ]) ?>
	</div>
</div>
