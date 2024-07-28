<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */

//$this->title = $model->id_customer;
$this->title = 'Detail '.'Customer';
$this->params['breadcrumbs'][] = ['label' => 'Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body customer-view">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
            'alamat',
            'nomor_telepon',
            'email:email',
            'npwp',
            'nama_kontak',
            'limit_kredit',
            'total_kredit',
            ],
        ]) ?>

    </div>
</div>

<?= $this->render('so/index', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
]); ?>