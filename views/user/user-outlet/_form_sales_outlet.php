<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
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

<div class="user-form box box-primary">
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
//            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-10',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>
    <div class="box-body table-responsive">
        <div class="col-md-12">

            <?php echo $form->errorSummary($model); ?>
            <?php
            //Pinjam field saja di : password_reset_token (nantinya akan direplace di controller)
            $listOutlet = \yii\helpers\ArrayHelper::map(\backend\models\OutletPenjualan::find()->orderBy([
                'nama_outlet' => SORT_ASC
            ])->asArray()->all(), 'id_outlet_penjualan', 'nama_outlet');
            ?>

            <?= $form->field($model, 'password_reset_token')->dropDownList(
                $listOutlet,
                ['prompt' => 'Pilih Outlet ...']
            )->label("Outlet") ; ?>

            <?php //= $form->field($model, 'role')->dropDownList(['10' => 'Member', '20' => 'Admin', '30' => 'Owner'], ['prompt' => 'Select...']) ?>
        </div>
        <div class="box-footer">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
