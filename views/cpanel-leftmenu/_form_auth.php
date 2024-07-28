<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CpanelLeftmenu */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }
</style>

<?php
//CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
?>
<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>
<div class="cpanel-leftmenu-form box box-primary">
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-2',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-10',
            ],
        ],
    ]); ?>
    <div class="box-body">

        <?= $form->field($model, 'menu_name')->textInput(['maxlength' => true]) ?>

        <?php //= $form->field($model, 'menu_icon')->textInput(['maxlength' => true]) ?>

        <?php //= $form->field($model, 'auth')->textarea(['rows' => 6]) ?>

        <?php
        $modelauthitem = new \common\modules\auth\models\AuthItem();
        /*
        $listRole = \yii\helpers\ArrayHelper::map(\common\modules\auth\models\AuthItem::find()
            ->where(["type" => 1])
            ->asArray()->all(), 'name', 'name');
            */
        $listRole = \backend\models\User::getListRoleLevel();
        ?>

        <?= $form->field($model, "auth")->dropDownList(
            $listRole,
            [
                'multiple' => true,
            ]
        )->label('Role'); ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
