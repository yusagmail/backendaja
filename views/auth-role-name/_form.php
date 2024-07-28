<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthRoleName */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-role-name-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?php
    $dataAssignment = ArrayHelper::map(\common\modules\auth\models\AuthItem::find()->where(['type'=>1])->andWhere(['name' => 'admin'])->asArray()->all(), 'name', 'name');
    $dataAssignment = ArrayHelper::map(\common\modules\auth\models\AuthItem::find()->where(['type'=>1])->asArray()->all(), 'name', 'name');
    
    echo $form->field($model, 'auth_item_name')->dropDownList($dataAssignment,
    ['prompt' => 'Select...']) ;
    ?>

    <?= $form->field($model, 'role_name')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'as_generic_choice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'as_generic_choice')->dropDownList(
        [ '1' => 'YA', '0' => 'TIDAK',]
    ); ?>

    <?= $form->field($model, 'is_active')->dropDownList(
        [ '1' => 'YA', '0' => 'TIDAK',]
    ); ?>


    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
