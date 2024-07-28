<?php

use backend\models\AppVocabularySearch;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MstStatus1 */

$baseName = AppVocabularySearch::getValueByKey('Mst Status2');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mst-status1-view box box-primary">

    <div class="box-header with-border">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_mst_status], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_mst_status], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_mst_status',
            'mst_status',
            'description:ntext',
            'is_active',
        ],
    ]) ?>
    </div>
</div>
