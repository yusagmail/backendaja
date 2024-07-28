<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Ubah Password untuk Supplier';
$this->params['breadcrumbs'][] = ['label' => 'User List', 'url' => ['userlist']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
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
    <?= $this->render('/supplier/_view_short', [
        'model' => $supplier,
    ]) ?>
	<div class="box box-primary table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                //'full_name',
                'username',
                //'email:email',
//                'password_hash',
//                'auth_key',
//                'status',
//                'password_reset_token',
                'user_level',
            ],
        ]) ?>
    </div>
<div class="user-form box box-primary">
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-8',
            ],
        ],
    ]); ?>
    <div class="box-body table-responsive">
        <div class="col-md-12">
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
			
			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?php //= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

            

            <?php //= $form->field($model, 'role')->dropDownList(['10' => 'Member', '20' => 'Admin', '30' => 'Owner'], ['prompt' => 'Select...']) ?>
        </div>
        <div class="box-footer">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
