<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Propinsi;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\PropinsiSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="box box-success by-location-search">
    <div class="box-header with-border">
      <h3 class="box-title">Filter Pencarian</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <?php /*
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        */ ?>
      </div>
    </div>
    <div class="box-body propinsi-search">

        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>

        <?php //= $form->field($model, 'id_propinsi') ?>

        <?php $dataPropinsi = ArrayHelper::map(Propinsi::find()->orderBy(['nama_propinsi' => SORT_ASC])->asArray()->all(), 'id_propinsi', 'nama_propinsi');
            echo $form->field($model, 'id_propinsi')->widget(Select2::classname(), [
                'data' => $dataPropinsi,
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'options' => [
                    'prompt' => 'Pilih propinsi',
                    'onchange' => '
                $.post( "' . Yii::$app->urlManager->createUrl('asset-item-location/lists?id=') . '"+$(this).val(), function( data ) {
                $( "select#locationsearch-id_kabupaten" ).html( data );
                });

        ']
        ])->label("Propinsi");
        ?>

        <?php //= $form->field($model, 'nama_propinsi') ?>

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?php //= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>