<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
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
            <?php
            if ($model->hasErrors()) {
            ?>
                
                    <?php echo $form->errorSummary($model); ?>
               
            <?php
            }
            ?>
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>



            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
			
			<?php
			//'admin','member','management (SA)','management (ST)','MEMBER','ADM'
			//echo $form->field($model, 'user_level')->dropDownList(['admin' => 'admin', 'member' => 'member (supplier)', 'management (SA)' => 'management (SA)', 'management (ST)'=>'management (ST)'],
				
			//Yang user member dihide (menunya bukan dari sini)
            $dataAssignment = ArrayHelper::map(\common\modules\auth\models\AuthItem::find()->where(['type'=>1])->andWhere(['name' => 'admin'])->asArray()->all(), 'name', 'name');
            $dataAssignment = ArrayHelper::map(\common\modules\auth\models\AuthItem::find()->where(['type'=>1])->asArray()->all(), 'name', 'name');
			echo $form->field($model, 'user_level')->dropDownList($dataAssignment,
//			echo $form->field($model, 'user_level')->dropDownList(['admin' => 'admin', 'member' => 'member (supplier)', 'management (SA)' => 'management (SA)', 'management (ST)'=>'management (ST)'], // old
			['prompt' => 'Select...']) ;
			
			?>

            <?php //= $form->field($model, 'role')->dropDownList(['10' => 'Member', '20' => 'Admin', '30' => 'Owner'], ['prompt' => 'Select...']) ?>
        </div>
        <div class="box-footer">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
