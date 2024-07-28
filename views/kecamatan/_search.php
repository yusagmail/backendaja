<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Kabupaten;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\KecamatanSearch */
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
    <div class="box-body kecamatan-search">

        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>

        <?php //= $form->field($model, 'id_kecamatan') ?>

        <?php //= $form->field($model, 'id_kabupaten') ?>

        <?php $dataKabupaten = ArrayHelper::map(Kabupaten::find()->orderBy(['nama_kabupaten' => SORT_ASC])->asArray()->all(), 'id_kabupaten', 'nama_kabupaten');
            echo $form->field($model, 'id_kabupaten')->widget(Select2::classname(), [
                'data' => $dataKabupaten,
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'options' => [
                    'prompt' => 'Pilih Kabupaten',
                    'onchange' => '
                $.post( "' . Yii::$app->urlManager->createUrl('asset-item-location/lists?id=') . '"+$(this).val(), function( data ) {
                $( "select#locationsearch-id_kabupaten" ).html( data );
                });

        ']
        ])->label("Kabupaten");
        ?>

        <?= $form->field($model, 'nama_kecamatan') ?>

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?php //= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>