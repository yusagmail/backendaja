<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AppSetting */

$this->title = 'Change Password';
$this->params['breadcrumbs'][] = $this->title;
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
<div class="change-password">

    <div class="change-password-form box box-success">

        <div class="box-header with-border">
            <?php $form = ActiveForm::begin([
                'layout' => 'horizontal',
                //'action' => ['index1'],
                'method' => 'post',
                'fieldConfig' => [
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-2',
                        'offset' => 'col-sm-offset-2',
                        'wrapper' => 'col-sm-9',
                    ],
                ],
            ]); ?>
            <?php echo $form->errorSummary($model); ?>
            <?= $form->field($model, 'oldPassword')->passwordInput() ?>
            <?= $form->field($model, 'newPassword')->passwordInput() ?>
            <?= $form->field($model, 'validationPassword')->passwordInput() ?>

            

            <div class="box-footer">
                <div class="form-group">
                    <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>