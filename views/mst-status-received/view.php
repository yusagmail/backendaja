<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\MstStatusReceived */

$this->title =CommonActionLabelEnum::DETAIL . ' '. AppVocabularySearch::getValueByKey(' Status Received');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL." ". AppVocabularySearch::getValueByKey(' Mst Status Received'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mst-status-received-view box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <div class="box-header with-border">
        <p>
            <?= Html::a('<< '.CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(CommonActionLabelEnum::UPDATE, ['update', 'id' => $model->id_status_received], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(CommonActionLabelEnum::DELETE, ['delete', 'id' => $model->id_status_received], [
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
//                'id_status_received',
                'status_received',
                [
                    'attribute' => 'is_active',
                    'value' => function ($model) {
                        return $model->is_active == 0 ? CommonActionLabelEnum::IN_ACTIVE : CommonActionLabelEnum::ACTIVE;
                    },
                ],
            ],
        ]) ?>
    </div>
</div>
