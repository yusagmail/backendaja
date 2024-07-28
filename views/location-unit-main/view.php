<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnit */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Location Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="location-unit-view box box-primary">
    <div class="box-header with-border">
    </div>
    <div class="box-body">
        <p>
            <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(CommonActionLabelEnum::UPDATE, ['update', 'id' => $model->id_location_unit], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(CommonActionLabelEnum::DELETE, ['delete', 'id' => $model->id_location_unit], [
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
                'id_location_unit',
                'id',
                'id_location',
                'id_location_unit_parent',
                'id_owner',
                'unit_name',
                'name',
                'number_reg',
                'denah_start_x',
                'denah_start_y',
                'denah_panjang',
                'denah_lebar',
                'status1_changed_user',
                'status1_changed_time',
            ],
        ]) ?>
    </div>
</div>