<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\JurnalType */

//$this->title = $model->id_jurnal_type;
$this->title = 'Detail '.'Jurnal Type';
$this->params['breadcrumbs'][] = ['label' => 'Jurnal Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body jurnal-type-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_jurnal_type], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_jurnal_type], [
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
                'type_jurnal',
            ],
        ]) ?>

    </div>
</div>
