<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialInItemProc */

//$this->title = $model->id_material_in_item_proc;
$this->title = 'Detail '.'Material In Item Proc';
$this->params['breadcrumbs'][] = ['label' => 'Material In Item Proc', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body material-in-item-proc-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_material_in_item_proc], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_material_in_item_proc], [
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
                'yard_awal',
            'yard_hasil1',
            'yard_hasil2',
            'yard_hasil3',
            'yard_hasil4',
            'yard_hasil5',
            'yard_hasil6',
            'yard_hasil_total',
            'buang1',
            'buang2',
            'is_packing',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
