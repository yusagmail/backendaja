<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthRoleName */

//$this->title = $model->id_auth_role_name;
$this->title = 'Detail '.'Auth Role Name';
$this->params['breadcrumbs'][] = ['label' => 'Auth Role Name', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body auth-role-name-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_auth_role_name], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_auth_role_name], [
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
                'auth_item_name',
                'role_name',
                //'as_generic_choice',
                [
                    'attribute' => 'as_generic_choice',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return $data->asGenericChoice;
                    },
                ],
                [
                    'attribute' => 'is_active',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return $data->isActive;
                    },
                ],
            ],
        ]) ?>

    </div>
</div>
