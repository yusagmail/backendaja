<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstAccrual */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mst-accrual-form box box-primary">

    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'layout' => 'horizontal',
        'class' => 'form-horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-3',
                'wrapper' => 'col-sm-10',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>
    <div class="box-body table-responsive">
        <div class="col-md-10">

    <?= $form->field($model, 'method')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>
        </div>
    </div>
            <div class="box-footer">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
            </div>

    <?php ActiveForm::end(); ?>
        </div>
</div>
