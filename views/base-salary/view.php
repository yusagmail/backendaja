<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BaseSalary */

//$this->title = $model->id_base_salary;
$this->title = 'Detail '.'Base Salary';
$this->params['breadcrumbs'][] = ['label' => 'Base Salary', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body base-salary-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_base_salary], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_base_salary], [
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
                'gaji_pokok',
                'tunjangan1',
                'tunjangan2',
                //'tunjangan3',
                //'tunjangan4',
                //'tunjangan5',
                'rate_lembur',
                'rate_kehadiran',
                /*
                'property1',
                'property2',
                'property3',
                'property4',
                'property5',
                */
            ],
        ]) ?>

    </div>
</div>
