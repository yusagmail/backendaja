<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SalaryMonthly */

//$this->title = $model->id_salary_monthly;
$this->title = 'Detail '.'Salary Monthly';
$this->params['breadcrumbs'][] = ['label' => 'Salary Monthly', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body salary-monthly-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_salary_monthly], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_salary_monthly], [
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
                'bulan',
            'tahun',
            'gaji_pokok',
            'tunjangan1',
            'tunjangan2',
            'tunjangan3',
            'tunjangan4',
            'tunjangan5',
            'jml_lembur',
            'jml_kehadiran',
            ],
        ]) ?>

    </div>
</div>
