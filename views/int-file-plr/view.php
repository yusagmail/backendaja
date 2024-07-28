<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\IntFilePlr */

//$this->title = $model->id_int_file_plr;
$this->title = 'Detail '.'Int File Plr';
$this->params['breadcrumbs'][] = ['label' => 'Int File Plr', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body int-file-plr-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_int_file_plr], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_int_file_plr], [
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
                'nama_file',
            'created_date',
            'created_user_id',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
