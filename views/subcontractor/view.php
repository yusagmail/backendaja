<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Subcontractor */

$this->title = 'Detail ' . 'Master Kontraktor Makloon';
$this->params['breadcrumbs'][] = ['label' => 'Master Kontraktor Makloon', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body customer-view">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_subcontractor], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_subcontractor], [
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
                // 'id_subcontractor',
                'nama_subcontractor',
                'alamat',
                // 'id_kabupaten',
                'nomor_telepon',
                'email:email',
                'npwp',
                'nama_kontak',
                // 'created_date',
                // 'created_user_id',
                // 'created_ip_address',
            ],
        ]) ?>

    </div>
</div>